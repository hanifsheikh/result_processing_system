import { createApp } from "vue";
import DynamicFields from "./DynamicFields.vue";

const app = createApp();
app.component("DynamicFields", DynamicFields);
app.mount("#app");
