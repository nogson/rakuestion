export default ({ $axios ,store}) => {
  $axios.onRequest(config => {
    return config
  })
}