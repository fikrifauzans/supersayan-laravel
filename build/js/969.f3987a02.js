"use strict";(globalThis["webpackChunksupersayan"]=globalThis["webpackChunksupersayan"]||[]).push([[969],{3969:(e,l,a)=>{a.r(l),a.d(l,{default:()=>i});var o=a(9835);function d(e,l,a,d,n,s){const m=(0,o.up)("s-loading"),t=(0,o.up)("t-input"),i=(0,o.up)("t-file-image"),r=(0,o.up)("s-form"),u=(0,o.up)("s-drawer");return(0,o.wg)(),(0,o.iD)(o.HY,null,[(0,o.Wm)(m,{load:n.loading},null,8,["load"]),(0,o.Wm)(u,{onRefresh:e.refresh,useModal:n.useModal,form:"",onSubmit:s.submit,onBack:e.back,Meta:n.Meta},{default:(0,o.w5)((()=>[(0,o._)("div",null,[(0,o.Wm)(r,{class:"q-px-md q-py-lg",icon:"person",title:"Edit Profile"},{default:(0,o.w5)((()=>[(0,o.Wm)(t,{col:"4",label:"name","r-icon":"person",required:"",modelValue:n.model.name,"onUpdate:modelValue":l[0]||(l[0]=e=>n.model.name=e)},null,8,["modelValue"]),(0,o.Wm)(t,{col:"4",label:"username","r-icon":"person",required:"",modelValue:n.model.username,"onUpdate:modelValue":l[1]||(l[1]=e=>n.model.username=e)},null,8,["modelValue"]),(0,o.Wm)(t,{col:"4",label:"email","r-icon":"mail",required:"",modelValue:n.model.email,"onUpdate:modelValue":l[2]||(l[2]=e=>n.model.email=e)},null,8,["modelValue"]),(0,o.Wm)(t,{col:"4",type:"password",label:"password","r-icon":"lock",modelValue:n.model.password,"onUpdate:modelValue":l[3]||(l[3]=e=>n.model.password=e)},null,8,["modelValue"]),(0,o.Wm)(t,{col:"4",label:"address","r-icon":"home",modelValue:n.model.address,"onUpdate:modelValue":l[4]||(l[4]=e=>n.model.address=e)},null,8,["modelValue"]),(0,o.Wm)(t,{col:"4",label:"phone",modelValue:n.model.phone,"onUpdate:modelValue":l[5]||(l[5]=e=>n.model.phone=e)},null,8,["modelValue"]),(0,o.Wm)(i,{col:"4",label:"Photo",modelValue:n.model.avatar,"onUpdate:modelValue":l[6]||(l[6]=e=>n.model.avatar=e)},null,8,["modelValue"])])),_:1})])])),_:1},8,["onRefresh","useModal","onSubmit","onBack","Meta"])],64)}a(9665);const n={module:"users",schema:"auth",module_name:"Management Account",formType:{show:!1,edit:!1,add:!1},model:{name:null,username:null,email:null,address:null,password:null},table:{columns:(e,l,a)=>[{name:"id",label:"Option",field:"id",sortable:!0,align:"left"},{name:"name",label:"Name",field:"name",sortable:!0,align:"left"},{name:"email",label:"Email",field:"email",sortable:!0,align:"left"},{name:"username",label:"Username",field:"username",sortable:!0,align:"left"},{name:"address",label:"Address",field:"address",sortable:!0,align:"left"},{name:"role-name",label:"Role",field:l=>e.transformField(l,"role.name"),sortable:!0,align:"left"},{name:"role-master_menu_id",label:"Master Menu",field:l=>e.transformField(l,"role.master_menu.name"),sortable:!0,align:"left"}]}},s={name:"MeForm",props:["modal","id","submitOnModal"],created(){this.$Handle.loadingStart(),this.Meta.model={},this.$Handle.loadingStop(),this.profile()},data(){return{Meta:n,useModal:!1,model:n.model,loading:!1,edit:!1,param:null}},watch:{submitOnModal:function(e){e.isTrusted&&this.submit()}},methods:{profile(){this.$api.get("me",((e,l,a,o)=>{200==l&&(this.model=e,this.$Handle.loadingStop())}),(e=>{401==e.status&&(this.$Handle.clearAllLS(),this.$Handle.errorMessage("Tidak ada sesi untuk anda"),this.$router.push({name:"login"}))}))},async submit(){this.$Handle.loadingStart(),delete this.model.is_customer,this.model=await this.$Handle.loopingForm(this.model),this.editData()},editData(){let e="profile";this.$api.post(e,this.model,((e,l,a,o)=>{200==l&&(this.profile(),this.$Handle.successMessage("Profile Edited"),this.$Handle.loadingStop())}))}}};var m=a(1639);const t=(0,m.Z)(s,[["render",d]]),i=t}}]);