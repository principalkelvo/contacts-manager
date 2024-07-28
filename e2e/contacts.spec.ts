import { test, expect } from "@playwright/test";
test.describe("Home Page", () => {
    test.beforeEach(async ({ page }) => {
        await page.goto("http://localhost:8000"); // Replace with your actual URL
    });
    test("should display the home page with Manage Contacts and Manage Groups buttons", async ({
        page,
    }) => {
        await expect(
            page.locator("text=Manage Your Contacts and Groups")
        ).toBeVisible();
        await expect(page.locator("text=Manage Contacts")).toBeVisible();
        await expect(page.locator("text=Manage Groups")).toBeVisible();
    });

    test("should navigate to /contacts when Manage Contacts button is clicked", async ({
        page,
    }) => {
        await page.click("text=Manage Contacts");
        await expect(page).toHaveURL("http://localhost:8000/contacts"); // Replace with your actual URL
    });

    test("should navigate to /groups when Manage Groups button is clicked", async ({
        page,
    }) => {
        await page.click("text=Manage Groups");
        await expect(page).toHaveURL("http://localhost:8000/groups"); // Replace with your actual URL
    });
});
test.describe("Groups Page", () => {
    test.beforeEach(async ({ page }) => {
        await page.goto("http://localhost:8000/groups"); // Replace with your actual URL
    });

    test("should display the groups page with the Add Group button", async ({
        page,
    }) => {
        await expect(page.locator("text=Add Group")).toBeVisible();
    });

    test("should display a list of groups", async ({ page }) => {
        await expect(page.locator("text=Name")).toBeVisible();
        await expect(page.locator("text=Action")).toBeVisible();
    });

    test("should open the Add Group modal when the Add Group button is clicked", async ({
        page,
    }) => {
        await page.click("text=Add Group");
        await expect(page.locator("text=Create Group")).toBeVisible();
    });

    test("should open the Edit Group modal when the Edit button is clicked", async ({
        page,
    }) => {
        await page.click("text=Add Group");
        await page.locator("text=Create Group").click();
        await page.getByLabel("Name").fill("test");
        await page.getByRole("button", { name: "Save" }).click();
        await page.getByRole("link", { name: "Edit" }).first().click();
        await expect(page.locator("text=Edit Group")).toBeVisible();
        await page.getByLabel("Name").fill("edited test");
        await page.getByRole("button", { name: "Save" }).click();
        await expect(page.getByRole('cell', { name: 'edited test' })).toBeVisible();
    });

    test("should delete a group when confirmed", async ({ page }) => {
         await page.click("text=Add Group");
         await page.locator("text=Create Group").click();
         await page.getByLabel("Name").fill("deleted test");
         await page.getByRole("button", { name: "Save" }).click();
         await page.getByRole("link", { name: "Delete" }).first().click();
         await page.click("text=Yes, delete it");
         await expect(
             page.getByRole("cell", { name: "deleted test" })
         ).not.toBeVisible();
    });
});
