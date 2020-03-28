export function debounce(fn, interval) {
  let timer
  return function () {
    clearTimeout(timer)
    timer = setTimeout(function () {
      fn()
    }, interval)
  }
}