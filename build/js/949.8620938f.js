"use strict";(globalThis["webpackChunkpreglearn"]=globalThis["webpackChunkpreglearn"]||[]).push([[949],{5949:(e,t,a)=>{a.r(t),a.d(t,{default:()=>w});var l=a(9835),s=a(6970);const i=["innerHTML"];function r(e,t,a,r,o,d){const h=(0,l.up)("s-loading"),n=(0,l.up)("s-top-table"),u=(0,l.up)("q-td"),p=(0,l.up)("s-table-option"),b=(0,l.up)("q-toggle"),m=(0,l.up)("q-table"),c=(0,l.up)("FormModal"),g=(0,l.up)("Detail"),f=(0,l.up)("t-modal"),w=(0,l.up)("s-drawer");return(0,l.wg)(),(0,l.iD)("div",null,[(0,l.Wm)(h,{load:o.loading},null,8,["load"]),(0,l.Wm)(w,{wrapCard:"",onRefresh:d.refresh,Meta:o.Meta,filter:o.filter,table:o.table,modelValue:o.filter.query,"onUpdate:modelValue":[t[6]||(t[6]=e=>o.filter.query=e),d.refresh]},{default:(0,l.w5)((()=>[(0,l.Wm)(m,{"virtual-scroll":"",class:"q-my-sm",rows:o.table.rows,columns:o.table.columns,"row-key":"id",selection:"multiple",selected:o.table.selected,"onUpdate:selected":t[2]||(t[2]=e=>o.table.selected=e),pagination:o.table.pagination,"onUpdate:pagination":t[3]||(t[3]=e=>o.table.pagination=e),style:(0,s.j5)(e.$Static.table.height()),dense:e.$Static.table.dense(),flat:e.$Static.table.flat(),color:e.$Static.table.color(),"rows-per-page-label":e.$Static.table.rowPerPageLabel(),"rows-per-page-options":e.$Static.table.rowPerPageOption(),square:e.$Static.table.square(),bordered:e.$Static.table.bordered(),"binary-state-sort":"","visible-columns":o.table.visibleColumns,onRequest:d.getData,loading:o.loading,filter:o.table.search,separator:e.$Static.table.separator()},{top:(0,l.w5)((()=>[(0,l.Wm)(n,{Meta:o.Meta,table:o.table,modelValue:o.table.search,"onUpdate:modelValue":t[0]||(t[0]=e=>o.table.search=e),onDelete:d.daleteData,trash:o.trash,onTrash:d.setTrash,onRestore:d.restoreData,onAdd:d.addData,onSeachReset:t[1]||(t[1]=e=>o.table.search=null),onOnFilter:d.setFilter,filter:o.filter},null,8,["Meta","table","modelValue","onDelete","trash","onTrash","onRestore","onAdd","onOnFilter","filter"])])),"body-cell-id":(0,l.w5)((e=>[1==o.trash?((0,l.wg)(),(0,l.j4)(u,{key:0})):((0,l.wg)(),(0,l.j4)(p,{key:1,onShow:t=>d.detail(e.key),onEdit:t=>d.edit(e.key),Meta:o.Meta},null,8,["onShow","onEdit","Meta"]))])),"body-cell-keluhan":(0,l.w5)((e=>[(0,l.Wm)(u,null,{default:(0,l.w5)((()=>[(0,l._)("div",{innerHTML:e.row.keluhan},null,8,i)])),_:2},1024)])),"body-cell-verifikasi":(0,l.w5)((e=>[(0,l.Wm)(u,null,{default:(0,l.w5)((()=>[(0,l.Wm)(b,{"true-value":1,modelValue:e.row.verifikasi,"onUpdate:modelValue":t=>e.row.verifikasi=t},null,8,["modelValue","onUpdate:modelValue"])])),_:2},1024)])),_:1},8,["rows","columns","selected","pagination","style","dense","flat","color","rows-per-page-label","rows-per-page-options","square","bordered","visible-columns","onRequest","loading","filter","separator"]),(0,l.Wm)(f,{modelValue:o.modal,"onUpdate:modelValue":t[5]||(t[5]=e=>o.modal=e),onSubmit:d.submit},{default:(0,l.w5)((()=>["form"==o.modalType?((0,l.wg)(),(0,l.j4)(c,{key:0,modal:o.useModal,id:o.id,submitOnModal:o.submitOnModal,onCloseModal:t[4]||(t[4]=e=>o.modal=!o.modal),onRefresh:d.refresh},null,8,["modal","id","submitOnModal","onRefresh"])):((0,l.wg)(),(0,l.j4)(g,{key:1,modal:o.useModal,id:o.id},null,8,["modal","id"]))])),_:1},8,["modelValue","onSubmit"])])),_:1},8,["onRefresh","Meta","filter","table","modelValue","onUpdate:modelValue"])])}a(9665);var o=a(6845),d=a(3125),h=a(1720);const n={name:o.Z.name,components:{FormModal:d["default"],Detail:h["default"]},data(){return{Meta:o.Z,id:null,table:o.Z.table,useModal:o.Z.formType,loading:!1,modal:!1,trash:!1,modalType:"",submitOnModal:null,filter:{value:!1,query:null}}},created(){this.table=this.$Handle.structureTable(this.table.columns(this.$Help,this.$Lang,this.Static)),this.$route.query.trash&&(this.trash=JSON.parse(this.$route.query.trash)),this.$route.query.search&&(this.trash=JSON.parse(this.$route.query.search)),this.$route.query.page&&(this.table.pagination={...this.$route.query}),this.refresh()},methods:{refresh(){this.getData()},getData(e){this.loading=!0,e&&(this.table.pagination=e.pagination);let{page:t,rowsPerPage:a,sortBy:l,descending:s}={...this.table.pagination},i=this.Meta.module+"?table=";i+="&like="+this.$Help.transformQuery(this.filter.query),i+=this.trash?"&trash=true":"",i+="&page="+t,i+="&limit="+a,i+="&order="+this.$Handle.transformDesc(l,s),this.table.search&&(i+="&search="+this.table.search),this.$api.get(i,((e,t,a,l)=>{200==t&&(this.table.rows=e.data.filter((e=>this.trash&&this.table.search?null!==e.deleted_at:e)),this.table.pagination.rowsNumber=this.table.search?this.table.rows.length:e.total,this.table.pagination.page=e.current_page,this.table.pagination.rowsPerPage=e.per_page,this.loading=!1)}),(e=>{})),this.$router.replace({query:{...this.table.pagination,seach:this.table.search,trash:this.trash}})},async daleteData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+=1==this.trash?"/force/":"/",t+=e.id,this.$api.delete(t,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},async restoreData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+="/restore/",t+=e.id,this.$api.put(t,e,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},setTrash(){this.trash=JSON.parse(this.trash),this.trash=!this.trash,this.table.selected=[],this.table.search=null,this.table.pagination.page=1,this.table.pagination.rowsNumber=1,this.refresh()},detail(e){this.id=e,this.modalType="detail",!0===this.useModal.show?this.modal=!0:this.$router.push({params:{id:e},name:"view-"+this.Meta.module,query:{...this.$route.query}})},edit(e){this.modalType="form",!0===this.useModal.edit?(this.modal=!0,this.id=e):this.$router.push({params:{id:e},name:"edit-"+this.Meta.module,query:{...this.$route.query}})},addData(){this.modalType="form",!0===this.useModal.add?this.modal=!0:this.$router.push({name:"add-"+this.Meta.module,query:{...this.$route.query}})},submit(e){this.$Handle.loadingStart(),this.submitOnModal=e,this.refresh()},setFilter(){this.filter.value=!0}}};var u=a(1639),p=a(5714),b=a(7220),m=a(3175),c=a(9984),g=a.n(c);const f=(0,u.Z)(n,[["render",r]]),w=f;g()(n,"components",{QTable:p.Z,QTd:b.Z,QToggle:m.Z})}}]);