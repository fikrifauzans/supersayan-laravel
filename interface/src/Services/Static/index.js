import date from '../Helper/date'

class Static {

  // TABLE
  table = {
    height(custom = null) {
      let height = '100px'
      if (custom !== null) height = custom
      return `height: calc(100vh - ${height})`
    },
    dense(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    flat(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    color(custom = null) {
      let val = custom !== null ? custom : 'primary'
      return val
    },
    rowPerPageLabel(custom = null) {
      let val = custom !== null ? custom : 'Records per page'
      return val
    },
    rowPerPageOption(custom = null) {
      let val = custom !== null ? custom : [25, 50, 75, 100, 0]
      return val
    },
    square(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    bordered(custom = null) {
      let val = custom !== null ? custom : false
      return val
    },
    separator(custom = null) {
      let val = custom !== null ? custom : 'horizontal'
      return val
    },
    class(custom = null) {
      let val = custom !== null ? custom : 'my-sticky-header-column-table'
      return val
    },

    // FORM

  }
  formHeight(custom = null) {
    let height = '0px'
    if (custom !== null) height = custom
    // return `height: calc(100vh - ${height});`
    return 'auto'
  }



  // -------------------------------------------------- APP

  sizeInventory() {
    return [{
      name: 'XS'
    },
    {
      name: 'SM'
    },
    {
      name: 'MD'
    },
    {
      name: 'LG'
    },
    {
      name: 'XL'
    },
    ]
  }

  genderList() {
    return [
      { val: 1, label: 'Laki Laki' },
      { val: 2, label: 'Perempuan' },
    ]
  }


  genderCheck(val) {

    if (val == 1) return 'Laki Laki'
    if (val == 2) return 'Perempuan'
    else return 'name'
  }

  descriptionModlue(module, status) {
    if (module == 'orders') {
      if (status != null) return `Detail seluruh jamaah tahap ${status} yang ada dalam satu bookingan/pemesanan`
      else return `Detail seluruh jamaah dalam satu bookingan/pemesanan`
    }
    if (module == 'booking-packages') {
      if (status != null) return `Data seluruh booking tahap ${status}, satu booking bisa terdiri dari 1 jamaah atau lebih`
      else return `Data seluruh booking, satu booking bisa terdiri dari 1 jamaah atau lebih`
    }
  }

  tahapanStatus(code) {
    if (code == 1) return 'Booking Seat'
    if (code == 2) return 'Pembayaran DP'
    if (code == 3) return 'Data dan Berkas'
    if (code == 4) return 'Penyerahan Perlengkapan'
    if (code == 5) return 'Pelunasan Tahap 2'
    if (code == 6) return 'Menunggu Keberangkatan'
    if (code == 7) return 'Diberangkatkan'

  }
  csoStatus(code) {
    if (code == 1) return 'Tidak Merespon'
    if (code == 2) return 'On Progress'
    // if (code == 3) return 'Selesai'
    // if (code == 4) return 'Refund'
  }
  csoStatusColor(code) {
    if (code == 1) return 'red'
    if (code == 2) return 'primary'
    // if (code == 3) return 'positive'
    // if (code == 4) return 'negative'
  }

  csoOptions = [
    { label: 'Tidak Merespon', val: 1, color: 'grey' },
    { label: 'On Progress', val: 2, color: 'primary' },
    // { label: 'Selesai', val: 3, color: 'positive' },
    // { label: 'Refund', val: 4, color: 'negative' },
  ]

  tahapanStatusColor(code) {
    if (code == 1) return 'grey'
    if (code == 2) return 'secondary'
    if (code == 3) return 'secondary'
    if (code == 4) return 'secondary'
    if (code == 5) return 'secondary'
    if (code == 6) return 'positive'
    if (code == 7) return 'positive'

  }

  paymentMethod() {
    return [
      { val: 'bca_va', label: 'BCA' },
      { val: 'bni_va', label: 'BNI' },
      { val: 'bri_va', label: 'BRI' },
    ]
  }

  statusPerlengkapan(status) {
    if (status == 1) return 'Menunggu Verifikasi'
    if (status == 2) return 'Perlengkapan Berhasil Verifikasi'
  }

  perlengkapanOpt(opt) {
    if (opt == 1) return 'Di Kirim Ke Alamat Tujuan'
    if (opt == 2) return 'Pengambilan Mandiri'
  }

  dataDitriOpt(opt) {
    if (opt == 1) return 'Isi Mandiri'
    if (opt == 2) return 'Di Bantu Tim Duta Baitullah'
  }

  sumPrice(items, field = null) {
    let sum = 0
    items.forEach((p) => {
      sum += field ? p[field] : p.price
    })
    return sum
  }
  totalTransaction(item) {
    let domestik = this.sumPrice(item.layanan_domestik)
    let tambahan = this.sumPrice(item.layanan_tambahan)
    let perlengkapan = this.sumPrice(item.perlengkapan)
    let total = 0
    total += domestik
    total += tambahan
    total += perlengkapan
    total += item.amount

    return total

  }

  totalTransactions(booking) {
    let sum = 0
    booking.transactions.forEach((element) => {
      sum += this.totalTransaction(element)
    })
    return sum
  }
  totalAllTransactions(transactions) {
    let sum = 0
    transactions.forEach((element) => {
      sum += this.totalTransaction(element)
    })
    return sum
  }

  sumTotalLayananDetail(transactions, layanan = 'layanan_domestik') {
    let sum = 0
    transactions.forEach(element => {
      sum += this.sumPrice(element[layanan])
    });
    return sum
  }

  checkStatusLunas(booking) {
    let status = true
    if ((this.totalTransactions(booking) - this.sumPrice(booking.settlement_payments)) > 0) {
      status = false
    }
    return status
  }

  countBookingVerification(val, field) {
    let data = val.filter(function (v) { return v[field] == 1 })
    return data ? data.length : 0
  }

  countTransactionsRoomType(transactions, type = 'triple') {
    let data = transactions.filter(function (val) { return val.package_opt == type })
    return data ? data.length : 0
  }

  sumAllBookingPayments(packages, field) {
    let total = 0
    if (packages.booking) {
      packages.booking.forEach(book => {
        if (book[field] && book[field].length > 0) total += this.sumPrice(book[field], 'price')
      });

    }
    return total
  }

  menuCustomer() {
    return [
      { label: 'Tentang kami', path: 'https://maghfirah.com/tentang-kami/' },
      { label: 'Syarat Dan Ketentuan', path: 'https://maghfirah.com/tentang-kami/' },
      { label: 'Bantuan', path: 'https://maghfirah.com/tentang-kami/' },
      { label: 'FAQ', path: 'https://maghfirah.com/tentang-kami/' },
      { label: 'Logout', color: 'negative', path: 'logout' },
    ]
  }
}

export default Static
