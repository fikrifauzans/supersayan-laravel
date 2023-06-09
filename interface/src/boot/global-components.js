import {
  boot
} from 'quasar/wrappers'

// SYSTEM
import Menu from '../components/system/Menu.vue'
import Filter from '../components/system/Filter.vue'
import Brand from '../components/system/Brand.vue'
import Header from '../components/system/HeaderCms.vue'
import TopTable from '../components/system/TopTable.vue'
import Loading from '../components/system/Loading.vue'
import TableOption from '../components/system/TableOption.vue'
import FormHeader from '../components/system/FormHeader.vue'
import AccountButton from '../components/system/AccountButton.vue'
import DefaultButton from '../components/system/DefaultButton.vue'
import HeaderCustomer from '../components/system/HeaderCustomer.vue'
import FooterCustomer from '../components/system/FooterCustomer.vue'
import Profile from '../components/system/Profile.vue'
// TOOLS FUNCTION
import Modal from '../components/tools/Modal.vue'
import Input from '../components/tools/Input.vue'
import List from '../components/tools/List.vue'
import SelectApi from '../components/tools/SelectApi.vue'
import Select from '../components/tools/Select.vue'
import DateTime from '../components/tools/DateInput.vue'
import FileImage from '../components/tools/FileImage.vue'
import TextEditor from '../components/tools/TextEditor.vue'
import Currency from '../components/tools/Currency.vue'
import ProgressBar from '../components/tools/ProgressBar.vue'
import ApiWhatsapp from '../components/tools/ApiWhatsapp.vue'
import SelectServerside from '../components/tools/SelectServerside.vue'
import Year from '../components/tools/Year.vue'
import ButtonStandard from '../components/system/ButtonStandard.vue'
import Tab from '../components/system/Tab.vue'

// CMS 
import Navbar from '../components/system/Navbar.vue'
import MenuCSM from '../components/system/MenuCms.vue'
import CarouselCms from '../components/system/CarouselCms.vue'
import ParagraphCms from '../components/system/ParagraphCms.vue'
import CardCms from '../components/system/CardCms.vue'
import CmsLogo from '../components/system/CmsLogo.vue'
import CmsFooter from '../components/system/CmsFooter.vue'









export default boot(async ({
  app
}) => {
  app.component('s-menu', Menu)
  app.component('s-filter', Filter)
  app.component('s-brand', Brand)
  app.component('s-drawer', Header)
  app.component('s-top-table', TopTable)
  app.component('s-loading', Loading)
  app.component('s-table-option', TableOption)
  app.component('s-form', FormHeader)
  app.component('s-account', AccountButton)
  app.component('s-btn', DefaultButton)
  app.component('s-drawer-c', HeaderCustomer)
  app.component('s-profile', Profile)


  app.component('t-button', ButtonStandard)
  app.component('t-modal', Modal)
  app.component('t-input', Input)
  app.component('t-select-api', SelectApi)
  app.component('t-serverside', SelectServerside)
  app.component('t-select', Select)
  app.component('t-datetime', DateTime)
  app.component('t-year', Year)
  app.component('t-list', List)
  app.component('t-file-image', FileImage)
  app.component('t-text-editor', TextEditor)
  app.component('t-currency', Currency)
  app.component('t-progress-bar', ProgressBar)
  app.component('t-api-whatsapp', ApiWhatsapp)
  app.component('t-tab', Tab)
  app.component('footer-customer', FooterCustomer)

  app.component('cms-navbar', Navbar)
  app.component('cms-menu', MenuCSM)
  app.component('cms-carousel', CarouselCms)
  app.component('cms-paragraph', ParagraphCms)
  app.component('cms-card', CardCms)
  app.component('cms-logo', CmsLogo)
  app.component('cms-footer', CmsFooter)




})
