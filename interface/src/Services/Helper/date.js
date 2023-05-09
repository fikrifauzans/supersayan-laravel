
export default {

  months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "October", "November", "Desember"],
  days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],


  // Date Input
  toLocalDate(input) {
    const date = new Date(input)
    const day = date.getDate()
    const month = this.months[date.getMonth()]
    const year = date.getFullYear()
    return `${day} ${month} ${year}`
  },

  fullLocalDate(input) {
    const date = new Date(input)
    const day = this.days[date.getDay()]
    const dayInt = date.getDate()
    const month = this.months[date.getMonth()]
    const year = date.getFullYear()
    return `${day} ${dayInt} ${month} ${year}`
  },

  toUnixTimestamp(input) {
    return (new Date(input).valueOf());
  },

  countingDown(input, format = 'string') {
    const countDownDate = new Date(input).getTime();
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval();
      return 'Waktu Habis'
    }

    if (format == 'string') return `${days}:${hours}:${minutes}:${seconds}`;
    if (format == 'object') return { days, hours, minutes, seconds }
  },

}
