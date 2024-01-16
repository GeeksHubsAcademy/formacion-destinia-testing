import { defineConfig } from "cypress";

export default defineConfig({

  e2e: {
    baseUrl: 'http://localhost:5173',
    defaultCommandTimeout: 1000,
    watchForFileChanges: true,
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
