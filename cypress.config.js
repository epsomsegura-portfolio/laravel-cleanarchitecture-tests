import { defineConfig } from "cypress";

export default defineConfig({
  env: {
    "APP_ENV": "testing"
  },
  e2e: {
    baseUrl: 'http://localhost:8000',
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
