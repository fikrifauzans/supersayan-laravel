"use strict";(globalThis["webpackChunkmaghfirah"]=globalThis["webpackChunkmaghfirah"]||[]).push([[276],{8276:(e,o,l)=>{l.r(o),l.d(o,{default:()=>S});var s=l(9835);const t={class:"col-12 justify-start row"},a=(0,s._)("div",{class:"text-h4 text-bold col-12"},"Buat Akun",-1),i=(0,s._)("div",{class:"col-12 text-weight-regular q-mb-lg"}," Silakan buat akun anda dibawah ini. ",-1),n={class:"col-12"},c=(0,s._)("small",{class:"col-12 text-weight-light"},"Nomor Telepon ",-1),r={class:"col-12"},d=(0,s._)("small",{class:"col-12 text-weight-light"},"Email ",-1),m={class:"col-12"},u=(0,s._)("small",{class:"col-12 text-weight-light"},"Nama ",-1),h={class:"col-12"},w=(0,s._)("small",{class:"col-12 text-weight-light"},"Password ",-1),p={class:"col-12"},g=(0,s._)("small",{class:"col-12 text-weight-light"},"Verifikasi Password ",-1),f={class:"col-12 row q-mt-xl"},b={class:"col-12 text-weight-regular absolute-top-left"};function _(e,o,l,_,k,v){const y=(0,s.up)("q-input"),V=(0,s.up)("q-btn"),P=(0,s.up)("q-form");return(0,s.wg)(),(0,s.j4)(P,{class:"text-h6 col-10 items-center row justify-center text-white",onSubmit:v.submit},{default:(0,s.w5)((()=>[(0,s._)("div",t,[a,i,(0,s._)("div",n,[c,(0,s.Wm)(y,{dense:"",outlined:"",class:"col-12",color:"info","bg-color":"white",modelValue:k.model.username,"onUpdate:modelValue":o[0]||(o[0]=e=>k.model.username=e)},null,8,["modelValue"])]),(0,s._)("div",r,[d,(0,s.Wm)(y,{dense:"",outlined:"",class:"col-12",color:"info","bg-color":"white",modelValue:k.model.email,"onUpdate:modelValue":o[1]||(o[1]=e=>k.model.email=e)},null,8,["modelValue"])]),(0,s._)("div",m,[u,(0,s.Wm)(y,{dense:"",outlined:"",class:"col-12",color:"info","bg-color":"white",modelValue:k.model.name,"onUpdate:modelValue":o[2]||(o[2]=e=>k.model.name=e)},null,8,["modelValue"])]),(0,s._)("div",h,[w,(0,s.Wm)(y,{dense:"",outlined:"",class:"col-12",color:"info","bg-color":"white",type:k.utils.showPassword?"text":"password",modelValue:k.model.password,"onUpdate:modelValue":o[4]||(o[4]=e=>k.model.password=e)},{append:(0,s.w5)((()=>[(0,s.Wm)(V,{icon:k.utils.showPassword?"visibility_off":"visibility",flat:"",color:"grey-6",rounded:"",round:"",onClick:o[3]||(o[3]=e=>k.utils.showPassword=!k.utils.showPassword)},null,8,["icon"])])),_:1},8,["type","modelValue"])]),(0,s._)("div",p,[g,(0,s.Wm)(y,{dense:"",outlined:"",class:"col-12",color:"info","bg-color":"white",type:k.utils.showConfirmPassword?"text":"password",modelValue:k.model.confirmPassword,"onUpdate:modelValue":o[6]||(o[6]=e=>k.model.confirmPassword=e)},{append:(0,s.w5)((()=>[(0,s.Wm)(V,{icon:k.utils.showConfirmPassword?"visibility_off":"visibility",flat:"",color:"grey-6",rounded:"",round:"",onClick:o[5]||(o[5]=e=>k.utils.showConfirmPassword=!k.utils.showConfirmPassword)},null,8,["icon"])])),_:1},8,["type","modelValue"])]),(0,s._)("div",f,[(0,s.Wm)(V,{label:"Buat Akun",class:"col-12 bg-white",size:"lg",noCaps:"",flat:"",color:"info",type:"submit"})]),(0,s._)("div",b,[(0,s.Wm)(V,{icon:"arrow_back_ios",label:"Kembali",flat:"","no-caps":"",onClick:o[7]||(o[7]=o=>e.$router.back())})])])])),_:1},8,["onSubmit"])}var k=l(9981),v=l.n(k);const y={name:"CreateUsers",created(){let e=this.$System.apiRoot();e+=this.$System.apiVersion(),e+=this.$Lang.getLang().toLowerCase();let o="/login",l=this.$System.developerCred(),s=this.$System.apiTimeout();this.instance=v().create({baseURL:e,timeout:s}),this.instance.defaults.headers={Accept:"application/json"},this.instance.post(o,l).then((e=>{this.token=e.data.data.token,this.instance.defaults.headers.common={Authorization:`Bearer ${this.token}`}})).catch((e=>{}))},data(){return{model:{username:null,email:null,name:null,password:null,confirmPassword:null,is_customer:1},utils:{showPassword:!1,showConfirmPassword:!1},instance:null,token:null}},methods:{submit(){this.createUser()},vetification(){let e="jamaah/otp";this.$api.post(e,{phone:this.model.username},((e,o,l,s)=>{}))},createUser(){let e="common/register";this.instance.post(e,this.model).then((e=>{this.$Handle.successMessage(e.data.message),this.$router.back()})).catch((e=>{}))}}};var V=l(1639),P=l(8326),x=l(3119),C=l(8879),$=l(9984),U=l.n($);const W=(0,V.Z)(y,[["render",_]]),S=W;U()(y,"components",{QForm:P.Z,QInput:x.Z,QBtn:C.Z})}}]);