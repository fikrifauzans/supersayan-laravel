"use strict";(globalThis["webpackChunkmaghfirah"]=globalThis["webpackChunkmaghfirah"]||[]).push([[103],{103:(e,t,a)=>{a.r(t),a.d(t,{default:()=>w});var l=a(9835),s=a(6970);function i(e,t,a,i,r,o){const h=(0,l.up)("s-loading"),d=(0,l.up)("s-top-table"),n=(0,l.up)("q-td"),u=(0,l.up)("s-table-option"),b=(0,l.up)("q-btn"),m=(0,l.up)("q-table"),p=(0,l.up)("FormModal"),c=(0,l.up)("Detail"),g=(0,l.up)("t-modal"),f=(0,l.up)("s-drawer");return(0,l.wg)(),(0,l.iD)("div",null,[(0,l.Wm)(h,{load:r.loading},null,8,["load"]),(0,l.Wm)(f,{wrapCard:"",onRefresh:o.refresh,Meta:r.Meta,filter:r.filter,table:r.table,modelValue:r.filter.query,"onUpdate:modelValue":[t[6]||(t[6]=e=>r.filter.query=e),o.refresh]},{default:(0,l.w5)((()=>[(0,l.Wm)(m,{"wrap-cells":"true","virtual-scroll":"",class:"q-my-sm",rows:r.table.rows,columns:r.table.columns,"row-key":"id",selection:"multiple",selected:r.table.selected,"onUpdate:selected":t[2]||(t[2]=e=>r.table.selected=e),pagination:r.table.pagination,"onUpdate:pagination":t[3]||(t[3]=e=>r.table.pagination=e),style:(0,s.j5)(e.$Static.table.height()),dense:e.$Static.table.dense(),flat:e.$Static.table.flat(),color:e.$Static.table.color(),"rows-per-page-label":e.$Static.table.rowPerPageLabel(),"rows-per-page-options":e.$Static.table.rowPerPageOption(),square:e.$Static.table.square(),bordered:e.$Static.table.bordered(),"binary-state-sort":"","visible-columns":r.table.visibleColumns,onRequest:o.getData,loading:r.loading,filter:r.table.search,separator:e.$Static.table.separator()},{top:(0,l.w5)((()=>[(0,l.Wm)(d,{Meta:r.Meta,table:r.table,modelValue:r.table.search,"onUpdate:modelValue":t[0]||(t[0]=e=>r.table.search=e),onDelete:o.daleteData,trash:r.trash,onTrash:o.setTrash,onRestore:o.restoreData,onAdd:o.addData,onSeachReset:t[1]||(t[1]=e=>r.table.search=null),onOnFilter:o.setFilter,filter:r.filter},null,8,["Meta","table","modelValue","onDelete","trash","onTrash","onRestore","onAdd","onOnFilter","filter"])])),"body-cell-id":(0,l.w5)((e=>[1==r.trash?((0,l.wg)(),(0,l.j4)(n,{key:0})):((0,l.wg)(),(0,l.j4)(u,{key:1,onShow:t=>o.detail(e.key),onEdit:t=>o.edit(e.key),Meta:r.Meta},null,8,["onShow","onEdit","Meta"]))])),"body-cell-childs":(0,l.w5)((e=>[(0,l.Wm)(n,null,{default:(0,l.w5)((()=>[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.row.childs,(t=>((0,l.wg)(),(0,l.iD)("div",{class:"col-12 row items-center",key:t},[(0,l.Wm)(b,{size:"sm",class:"q-mr-sm",color:t.value==e.row.answer_value?"positive":"primary",flat:t.value!=e.row.answer_value,round:"",rounded:"",label:t.value},null,8,["color","flat","label"]),(0,l.Uk)(" "+(0,s.zw)(t.answer),1)])))),128))])),_:2},1024)])),_:1},8,["rows","columns","selected","pagination","style","dense","flat","color","rows-per-page-label","rows-per-page-options","square","bordered","visible-columns","onRequest","loading","filter","separator"]),(0,l.Wm)(g,{modelValue:r.modal,"onUpdate:modelValue":t[5]||(t[5]=e=>r.modal=e),onSubmit:o.submit},{default:(0,l.w5)((()=>["form"==r.modalType?((0,l.wg)(),(0,l.j4)(p,{key:0,modal:r.useModal,id:r.id,submitOnModal:r.submitOnModal,onCloseModal:t[4]||(t[4]=e=>r.modal=!r.modal),onRefresh:o.refresh},null,8,["modal","id","submitOnModal","onRefresh"])):((0,l.wg)(),(0,l.j4)(c,{key:1,modal:r.useModal,id:r.id},null,8,["modal","id"]))])),_:1},8,["modelValue","onSubmit"])])),_:1},8,["onRefresh","Meta","filter","table","modelValue","onUpdate:modelValue"])])}a(9665);var r=a(9684),o=a(6587),h=a(5209);const d={name:r.Z.name,components:{FormModal:o["default"],Detail:h["default"]},data(){return{Meta:r.Z,id:null,table:r.Z.table,useModal:r.Z.formType,loading:!1,modal:!1,trash:!1,modalType:"",submitOnModal:null,filter:{value:!1,query:null}}},created(){this.table=this.$Handle.structureTable(this.table.columns(this.$Help,this.$Lang,this.Static)),this.$route.query.trash&&(this.trash=JSON.parse(this.$route.query.trash)),this.$route.query.search&&(this.trash=JSON.parse(this.$route.query.search)),this.$route.query.page&&(this.table.pagination={...this.$route.query}),this.refresh()},methods:{refresh(){this.getData()},getData(e){this.loading=!0,e&&(this.table.pagination=e.pagination);let{page:t,rowsPerPage:a,sortBy:l,descending:s}={...this.table.pagination},i=this.Meta.module+"?table=";i+="&like="+this.$Help.transformQuery(this.filter.query),i+=this.trash?"&trash=true":"",i+="&page="+t,i+="&limit="+a,i+="&order="+this.$Handle.transformDesc(l,s),this.table.search&&(i+="&search="+this.table.search),this.$api.get(i,((e,t,a,l)=>{200==t&&(this.table.rows=e.data.filter((e=>this.trash&&this.table.search?null!==e.deleted_at:e)),this.table.pagination.rowsNumber=this.table.search?this.table.rows.length:e.total,this.table.pagination.page=e.current_page,this.table.pagination.rowsPerPage=e.per_page,this.loading=!1)}),(e=>{})),this.$router.replace({query:{...this.table.pagination,seach:this.table.search,trash:this.trash}})},async daleteData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+=1==this.trash?"/force/":"/",t+=e.id,this.$api.delete(t,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},async restoreData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+="/restore/",t+=e.id,this.$api.put(t,e,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},setTrash(){this.trash=JSON.parse(this.trash),this.trash=!this.trash,this.table.selected=[],this.table.search=null,this.table.pagination.page=1,this.table.pagination.rowsNumber=1,this.refresh()},detail(e){this.id=e,this.modalType="detail",!0===this.useModal.show?this.modal=!0:this.$router.push({params:{id:e},name:"view-"+this.Meta.module,query:{...this.$route.query}})},edit(e){this.modalType="form",!0===this.useModal.edit?(this.modal=!0,this.id=e):this.$router.push({params:{id:e},name:"edit-"+this.Meta.module,query:{...this.$route.query}})},addData(){this.modalType="form",!0===this.useModal.add?this.modal=!0:this.$router.push({name:"add-"+this.Meta.module,query:{...this.$route.query}})},submit(e){this.$Handle.loadingStart(),this.submitOnModal=e,this.refresh()},setFilter(){this.filter.value=!0}}};var n=a(1639),u=a(5714),b=a(7220),m=a(1480),p=a(8879),c=a(9984),g=a.n(c);const f=(0,n.Z)(d,[["render",i]]),w=f;g()(d,"components",{QTable:u.Z,QTd:b.Z,QRadio:m.Z,QBtn:p.Z})}}]);