class System {

  // API CONFIG
  apiRoot() {
    // // return process.env.API_BASE_URL ?? 'https://api.beytcoffeetigabelas.com'
    // if (window.location.origin == 'http://localhost:8080') {
    //   return 'http://localhost:8090/'
    //   // return 'https://api.beytcoffeetigabelas.com/'
    //   // return 'https://api.ums.dutabaitullah.com/'
    // }
    // // else return 'api.ums.dutabaitullah.com/'
    // else return 'https://ec-api.beytcoffeetigabelas.com/'
    // // else return 'http://localhost:8090/'
    return 'https://ec-api.beytcoffeetigabelas.com/'; 
  }
  apiTimeout() { return 10000 }

  developerCred() {
    return { username: 'dev.maghfirah', password: 'maghfirah2118' }
  }

  apiVersion() {
    return 'api/v1/'
  }

  midtransClientKey() {
    return 'SB-Mid-client-BI85k5nvzyemnk7n'
  }

  midtransUrl() {
    return 'https://app.sandbox.midtrans.com/snap/snap.js'
  }
}

export default System
