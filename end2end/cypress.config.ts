import { defineConfig } from "cypress";

//dotenv

// import { config } from "dotenv";
// config({ path: ".env" });



export default defineConfig({
  e2e: {
    baseUrl: process.env.BASE_URL || "http://localhost:5173",
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },

  component: {
    devServer: {
      framework: "vue",
      bundler: "vite",
    },
  },
});
