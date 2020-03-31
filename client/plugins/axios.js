export default ({ $axios ,store}) => {
  $axios.onRequest(config => {
    config.headers = {'Access-Control-Allow-Origin': '*'}

    return config
  })
}