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

  axios.interceptors.request.use(
    (config) => {
      const token = localStorage.getItem('authTokenBelmira');
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
    },
    (error) => {
      return Promise.reject(error);
    }
  );

createApp(app).use(router).use(vuex).use(vuetify).mount("#app")
