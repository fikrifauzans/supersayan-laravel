"use strict";(globalThis["webpackChunksupersayan"]=globalThis["webpackChunksupersayan"]||[]).push([[128],{7128:(e,t,a)=>{a.r(t),a.d(t,{default:()=>f});var s=a(9835),l=a(6970);function i(e,t,a,i,r,o){const h=(0,s.up)("s-loading"),d=(0,s.up)("s-top-table"),n=(0,s.up)("q-td"),u=(0,s.up)("s-table-option"),b=(0,s.up)("q-table"),p=(0,s.up)("FormModal"),m=(0,s.up)("Detail"),c=(0,s.up)("t-modal"),g=(0,s.up)("s-drawer");return(0,s.wg)(),(0,s.iD)(s.HY,null,[(0,s.Wm)(h,{load:r.loading},null,8,["load"]),(0,s.Wm)(g,{onRefresh:o.refresh,Meta:r.Meta,filter:r.filter,table:r.table,modelValue:r.filter.query,"onUpdate:modelValue":[t[6]||(t[6]=e=>r.filter.query=e),o.refresh]},{default:(0,s.w5)((()=>[(0,s.Wm)(b,{"virtual-scroll":"",class:"q-my-sm",rows:r.table.rows,columns:r.table.columns,"row-key":"id",selection:"multiple",selected:r.table.selected,"onUpdate:selected":t[2]||(t[2]=e=>r.table.selected=e),pagination:r.table.pagination,"onUpdate:pagination":t[3]||(t[3]=e=>r.table.pagination=e),style:(0,l.j5)(e.$Static.table.height()),dense:e.$Static.table.dense(),flat:e.$Static.table.flat(),color:e.$Static.table.color(),"rows-per-page-label":e.$Static.table.rowPerPageLabel(),"rows-per-page-options":e.$Static.table.rowPerPageOption(),square:e.$Static.table.square(),bordered:e.$Static.table.bordered(),"binary-state-sort":"","visible-columns":r.table.visibleColumns,onRequest:o.getData,loading:r.loading,filter:r.table.search,separator:e.$Static.table.separator()},{top:(0,s.w5)((()=>[(0,s.Wm)(d,{Meta:r.Meta,table:r.table,modelValue:r.table.search,"onUpdate:modelValue":t[0]||(t[0]=e=>r.table.search=e),onDelete:o.daleteData,trash:r.trash,onTrash:o.setTrash,onRestore:o.restoreData,onAdd:o.addData,onSeachReset:t[1]||(t[1]=e=>r.table.search=null),onOnFilter:o.setFilter,filter:r.filter},null,8,["Meta","table","modelValue","onDelete","trash","onTrash","onRestore","onAdd","onOnFilter","filter"])])),"body-cell-id":(0,s.w5)((e=>[1==r.trash?((0,s.wg)(),(0,s.j4)(n,{key:0})):((0,s.wg)(),(0,s.j4)(u,{key:1,onShow:t=>o.detail(e.key),onEdit:t=>o.edit(e.key),Meta:r.Meta},null,8,["onShow","onEdit","Meta"]))])),_:1},8,["rows","columns","selected","pagination","style","dense","flat","color","rows-per-page-label","rows-per-page-options","square","bordered","visible-columns","onRequest","loading","filter","separator"]),(0,s.Wm)(c,{modelValue:r.modal,"onUpdate:modelValue":t[5]||(t[5]=e=>r.modal=e),onSubmit:o.submit},{default:(0,s.w5)((()=>["form"==r.modalType?((0,s.wg)(),(0,s.j4)(p,{key:0,modal:r.useModal,id:r.id,submitOnModal:r.submitOnModal,onCloseModal:t[4]||(t[4]=e=>r.modal=!r.modal),onRefresh:o.refresh},null,8,["modal","id","submitOnModal","onRefresh"])):((0,s.wg)(),(0,s.j4)(m,{key:1,modal:r.useModal,id:r.id},null,8,["modal","id"]))])),_:1},8,["modelValue","onSubmit"])])),_:1},8,["onRefresh","Meta","filter","table","modelValue","onUpdate:modelValue"])],64)}a(9665);var r=a(7224),o=a(9939),h=a(6658);const d={name:r.Z.name,components:{FormModal:o["default"],Detail:h["default"]},data(){return{Meta:r.Z,id:null,table:r.Z.table,useModal:r.Z.formType,loading:!1,modal:!1,trash:!1,modalType:"",submitOnModal:null,filter:{value:!1,query:null}}},created(){this.table=this.$Handle.structureTable(this.table.columns(this.$Help,this.$Lang,this.Static)),this.$route.query.trash&&(this.trash=JSON.parse(this.$route.query.trash)),this.$route.query.search&&(this.trash=JSON.parse(this.$route.query.search)),this.$route.query.page&&(this.table.pagination={...this.$route.query}),this.refresh()},methods:{refresh(){this.getData()},getData(e){this.loading=!0,e&&(this.table.pagination=e.pagination);let{page:t,rowsPerPage:a,sortBy:s,descending:l}={...this.table.pagination},i=this.Meta.module+"?table=";i+="&like="+this.$Help.transformQuery(this.filter.query),i+=this.trash?"&trash=true":"",i+="&page="+t,i+="&limit="+a,i+="&order="+this.$Handle.transformDesc(s,l),this.table.search&&(i+="&search="+this.table.search),this.$api.get(i,((e,t,a,s)=>{200==t&&(this.table.rows=e.data.filter((e=>this.trash&&this.table.search?null!==e.deleted_at:e)),this.table.pagination.rowsNumber=this.table.search?this.table.rows.length:e.total,this.table.pagination.page=e.current_page,this.table.pagination.rowsPerPage=e.per_page,this.loading=!1)}),(e=>{})),this.$router.replace({query:{...this.table.pagination,seach:this.table.search,trash:this.trash}})},async daleteData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+=1==this.trash?"/force/":"/",t+=e.id,this.$api.delete(t,((e,t,a,s)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},async restoreData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+="/restore/",t+=e.id,this.$api.put(t,e,((e,t,a,s)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},setTrash(){this.trash=JSON.parse(this.trash),this.trash=!this.trash,this.table.selected=[],this.table.search=null,this.table.pagination.page=1,this.table.pagination.rowsNumber=1,this.refresh()},detail(e){this.id=e,this.modalType="detail",!0===this.useModal.show?this.modal=!0:this.$router.push({params:{id:e},name:"view-"+this.Meta.module,query:{...this.$route.query}})},edit(e){this.modalType="form",!0===this.useModal.edit?(this.modal=!0,this.id=e):this.$router.push({params:{id:e},name:"edit-"+this.Meta.module,query:{...this.$route.query}})},addData(){this.modalType="form",!0===this.useModal.add?this.modal=!0:this.$router.push({name:"add-"+this.Meta.module,query:{...this.$route.query}})},submit(e){this.$Handle.loadingStart(),this.submitOnModal=e,this.refresh()},setFilter(){this.filter.value=!0}}};var n=a(1639),u=a(5714),b=a(8879),p=a(7220),m=a(9984),c=a.n(m);const g=(0,n.Z)(d,[["render",i]]),f=g;c()(d,"components",{QTable:u.Z,QBtn:b.Z,QTd:p.Z})}}]);