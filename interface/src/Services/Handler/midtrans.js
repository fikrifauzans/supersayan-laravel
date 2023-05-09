import System from "../System"

const system = new System()

export default {
  initMidtrans() {
    return new Promise((resolve, reject) => {
      const js = system.midtransUrl()
      if(document.querySelector(`script[src="${js}"]`)) {
        resolve()
      } else {
        const el = document.createElement('script')
        el.setAttribute('src', js)
        el.setAttribute('data-client-key', system.midtransClientKey())
        document.head.appendChild(el)
        resolve()
      }
    })
  },

  globalWindowMidtrans() {
    return new Promise((resolve, reject) => {
      if (document.getElementById('midtrans-script')) {
        resolve()
      }
      else {
        const globs = document.createElement('script')
        globs.setAttribute('id', 'midtrans-script')
        globs.type = 'text/javascript'
        globs.innerHTML = 'window.$MIDTRANS = snap ;'
        document.getElementsByTagName('head')[0].appendChild(globs)
        resolve()
      }
    })
  }
}
