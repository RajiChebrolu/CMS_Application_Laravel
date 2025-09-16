import { test, expect } from "@playwright/test";

test("Create, Edit, Delete post", async ({ page }) => {
    await page.goto("http://localhost:8000/login");
    await page.fill('input[name="email"]', "admin@gmail.com");
    await page.fill('input[name="password"]', "admin");
    await page.click('button:has-text("Login")');
    await page.fill('input[name="title"]', "Playwright Post");
    await page.fill('textarea[name="body"]', "This is a body");
    await page.setInputFiles(
        'input[name="image"]',
        "tests/fixtures/test-image.jpg"
    );
    await page.click('button:has-text("Create")');
    await expect(page.locator("text=Your post was created")).toBeVisible({
        timeout: 80000,
    });
    await page.click('a:has-text("Update")');
    await page.fill('input[name="title"]', "Updated Post");
    await page.click('button:has-text("Update")');
    await expect(page.locator("text=Your post was udpated")).toBeVisible();
    await page
        .locator('form:has(button:has-text("Delete"))')
        .nth(0)
        .evaluate((form) => form.submit());
    await expect(page.locator("text=Your post was deleted")).toBeVisible();
});
