const env = process.env.NODE_ENV || 'development';
const API_URL = env === 'production' ? process.env.API_URL : 'http://localhost'


export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: process.env.npm_package_description || ''}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
    ]
  },
  srcDir: 'client',
  /*
  ** Customize the progress-bar color
  */
  loading: {color: '#fff'},
  /*
  ** Global CSS
  */
  css: [
    // プロジェクト内の SASS ファイル
    {src: '@/assets/scss/style.scss', lang: 'scss'}
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    {src: "@/plugins/axios"},
    {src: '~plugins/quill.js', ssr: false}

  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org
    ['bootstrap-vue/nuxt', {css: false}],
    '@nuxtjs/axios',
    '@nuxtjs/style-resources',
    ['cookie-universal-nuxt', {parseJSON: false}],
    ['@nuxtjs/moment', ['ja']]
    // 'nuxt-fontawesome'
  ],
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  },
  generate: {
    dir: 'public/dist'
  },
  axios: {
    baseURL: API_URL
  },
  styleResources: {
    scss: [
      '~/assets/scss/index.scss',
      '~/assets/scss/util.scss'
    ]
  },
  bootstrapVue: {
    icons: true // Install the IconsPlugin (in addition to BootStrapVue plugin
  }
}
