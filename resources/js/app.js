import './bootstrap';

import { createApp} from 'vue';
import app from './components/App.vue';
import router from  './router/index.js';
import vuex from './store/index.js';
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'


const vuetify = createVuetify({
    components,
    directives,
  })


createApp(app).use(router).use(vuex).use(vuetify).mount("#app")
