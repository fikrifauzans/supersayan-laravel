"use strict";(globalThis["webpackChunkmaghfirah"]=globalThis["webpackChunkmaghfirah"]||[]).push([[316],{3316:(e,t,a)=>{a.r(t),a.d(t,{default:()=>M});var l=a(9835),s=a(6970);const i=(0,l._)("div",{class:"q-pb-sm"},null,-1),o=["innerHTML"];function r(e,t,a,r,n,h){const d=(0,l.up)("s-loading"),u=(0,l.up)("q-tab"),b=(0,l.up)("q-tabs"),p=(0,l.up)("s-top-table"),m=(0,l.up)("q-td"),g=(0,l.up)("s-table-option"),c=(0,l.up)("q-img"),w=(0,l.up)("q-table"),y=(0,l.up)("FormModal"),f=(0,l.up)("Detail"),$=(0,l.up)("t-modal"),M=(0,l.up)("s-drawer");return(0,l.wg)(),(0,l.iD)("div",null,[(0,l.Wm)(d,{load:n.loading},null,8,["load"]),(0,l.Wm)(M,{wrapCard:"",onRefresh:h.refresh,Meta:n.Meta,filter:n.filter,table:n.table,modelValue:n.filter.query,"onUpdate:modelValue":[t[12]||(t[12]=e=>n.filter.query=e),h.refresh]},{default:(0,l.w5)((()=>[i,"admin"===e.$Handle.getLS("role").slug?((0,l.wg)(),(0,l.j4)(b,{key:0,modelValue:n.tab,"onUpdate:modelValue":t[2]||(t[2]=e=>n.tab=e),"inline-label":"","outside-arrows":"","mobile-arrows":"",class:"bg-primary text-white shadow-2",style:{"border-radius":"10px 10px 0 0"}},{default:(0,l.w5)((()=>[(0,l.Wm)(u,{label:"All",name:null,noCaps:"",onClick:t[0]||(t[0]=e=>h.getData())}),((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(n.Meta.group,(e=>((0,l.wg)(),(0,l.j4)(u,{key:e,name:e,label:e,noCaps:"",onClick:t[1]||(t[1]=e=>h.getData())},null,8,["name","label"])))),128))])),_:1},8,["modelValue"])):((0,l.wg)(),(0,l.j4)(b,{key:1,modelValue:n.tab,"onUpdate:modelValue":t[5]||(t[5]=e=>n.tab=e),"inline-label":"","outside-arrows":"","mobile-arrows":"",class:"bg-primary text-white shadow-2",style:{"border-radius":"10px 10px 0 0"}},{default:(0,l.w5)((()=>[(0,l.Wm)(u,{label:"All",name:null,noCaps:"",onClick:t[3]||(t[3]=e=>h.getData())}),((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(n.group,(e=>((0,l.wg)(),(0,l.j4)(u,{key:e,name:e.group,label:e.group,noCaps:"",onClick:t[4]||(t[4]=e=>h.getData())},null,8,["name","label"])))),128))])),_:1},8,["modelValue"])),(0,l.Wm)(w,{"virtual-scroll":"",class:"q-my-sm",rows:n.table.rows,columns:n.table.columns,"row-key":"id",selection:"multiple",selected:n.table.selected,"onUpdate:selected":t[8]||(t[8]=e=>n.table.selected=e),pagination:n.table.pagination,"onUpdate:pagination":t[9]||(t[9]=e=>n.table.pagination=e),style:(0,s.j5)(e.$Static.table.height()),dense:e.$Static.table.dense(),flat:e.$Static.table.flat(),color:e.$Static.table.color(),"rows-per-page-label":e.$Static.table.rowPerPageLabel(),"rows-per-page-options":e.$Static.table.rowPerPageOption(),square:e.$Static.table.square(),bordered:e.$Static.table.bordered(),"binary-state-sort":"","visible-columns":n.table.visibleColumns,onRequest:h.getData,loading:n.loading,filter:n.table.search,separator:e.$Static.table.separator()},{top:(0,l.w5)((()=>[(0,l.Wm)(p,{Meta:n.Meta,table:n.table,modelValue:n.table.search,"onUpdate:modelValue":t[6]||(t[6]=e=>n.table.search=e),onDelete:h.daleteData,trash:n.trash,onTrash:h.setTrash,onRestore:h.restoreData,onAdd:h.addData,onSeachReset:t[7]||(t[7]=e=>n.table.search=null),onOnFilter:h.setFilter,filter:n.filter},null,8,["Meta","table","modelValue","onDelete","trash","onTrash","onRestore","onAdd","onOnFilter","filter"])])),"body-cell-id":(0,l.w5)((e=>[1==n.trash?((0,l.wg)(),(0,l.j4)(m,{key:0})):((0,l.wg)(),(0,l.j4)(g,{key:1,onShow:t=>h.detail(e.key),onEdit:t=>h.edit(e.key),Meta:n.Meta},null,8,["onShow","onEdit","Meta"]))])),"body-cell-photo_id":(0,l.w5)((t=>[(0,l.Wm)(m,null,{default:(0,l.w5)((()=>[t&&t.row&&t.row.photo&&t.row.photo.path?((0,l.wg)(),(0,l.j4)(c,{key:0,src:e.$System.storageUrl(t.row.photo.name),style:{width:"100px",height:"100px"}},null,8,["src"])):(0,l.kq)("",!0)])),_:2},1024)])),"body-cell-details":(0,l.w5)((e=>[(0,l.Wm)(m,null,{default:(0,l.w5)((()=>[(0,l._)("div",{innerHTML:e.row.details},null,8,o)])),_:2},1024)])),_:1},8,["rows","columns","selected","pagination","style","dense","flat","color","rows-per-page-label","rows-per-page-options","square","bordered","visible-columns","onRequest","loading","filter","separator"]),(0,l.Wm)($,{modelValue:n.modal,"onUpdate:modelValue":t[11]||(t[11]=e=>n.modal=e),onSubmit:h.submit},{default:(0,l.w5)((()=>["form"==n.modalType?((0,l.wg)(),(0,l.j4)(y,{key:0,modal:n.useModal,id:n.id,submitOnModal:n.submitOnModal,onCloseModal:t[10]||(t[10]=e=>n.modal=!n.modal),onRefresh:h.refresh},null,8,["modal","id","submitOnModal","onRefresh"])):((0,l.wg)(),(0,l.j4)(f,{key:1,modal:n.useModal,id:n.id},null,8,["modal","id"]))])),_:1},8,["modelValue","onSubmit"])])),_:1},8,["onRefresh","Meta","filter","table","modelValue","onUpdate:modelValue"])])}a(9665);var n=a(1939),h=a(6262),d=a(6967);const u={name:n.Z.name,components:{FormModal:h["default"],Detail:d["default"]},data(){return{Meta:n.Z,id:null,table:n.Z.table,useModal:n.Z.formType,loading:!1,modal:!1,trash:!1,modalType:"",submitOnModal:null,filter:{value:!1,query:null},tab:null,group:[]}},created(){console.log(this.$route.query.tab),this.table=this.$Handle.structureTable(this.table.columns(this.$route.query.tab)),this.getContentsGroup(),this.$route.query.tab&&(this.tab=this.$route.query.tab),this.$route.query.trash&&(this.trash=JSON.parse(this.$route.query.trash)),this.$route.query.search&&(this.trash=JSON.parse(this.$route.query.search)),this.$route.query.page&&(this.table.pagination={...this.$route.query}),this.refresh()},methods:{refresh(){this.getData()},getData(e){this.loading=!0,e&&(this.table.pagination=e.pagination);let{page:t,rowsPerPage:a,sortBy:l,descending:s}={...this.table.pagination},i=this.Meta.module+"?table=";this.tab&&(i+="&where=group:"+this.tab),i+="&like="+this.$Help.transformQuery(this.filter.query),i+=this.trash?"&trash=true":"",i+="&page="+t,i+="&limit="+a,i+="&order="+this.$Handle.transformDesc(l,s),this.table.search&&(i+="&search="+this.table.search),this.$api.get(i,((e,t,a,l)=>{200==t&&(this.table.rows=e.data.filter((e=>this.trash&&this.table.search?null!==e.deleted_at:e)),this.table.pagination.rowsNumber=this.table.search?this.table.rows.length:e.total,this.table.pagination.page=e.current_page,this.table.pagination.rowsPerPage=e.per_page,this.loading=!1,this.table.columns=this.Meta.table.columns(this.tab))}),(e=>{})),this.$router.replace({query:{...this.table.pagination,seach:this.table.search,trash:this.trash,tab:this.tab}})},async daleteData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+=1==this.trash?"/force/":"/",t+=e.id,this.$api.delete(t,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},async restoreData(){this.loading=!0,await this.table.selected.forEach((e=>{let t=this.Meta.module;t+="/restore/",t+=e.id,this.$api.put(t,e,((e,t,a,l)=>{this.$Handle.successMessage(a),this.table.selected=[],this.refresh()}))}))},setTrash(){this.trash=JSON.parse(this.trash),this.trash=!this.trash,this.table.selected=[],this.table.search=null,this.table.pagination.page=1,this.table.pagination.rowsNumber=1,this.refresh()},detail(e){this.id=e,this.modalType="detail",!0===this.useModal.show?this.modal=!0:this.$router.push({params:{id:e},name:"view-"+this.Meta.module,query:{...this.$route.query}})},edit(e){this.modalType="form",!0===this.useModal.edit?(this.modal=!0,this.id=e):this.$router.push({params:{id:e},name:"edit-"+this.Meta.module,query:{...this.$route.query}})},addData(){this.modalType="form",!0===this.useModal.add?this.modal=!0:this.$router.push({name:"add-"+this.Meta.module,query:{...this.$route.query}})},submit(e){this.$Handle.loadingStart(),this.submitOnModal=e,this.refresh()},setFilter(){this.filter.value=!0},async getContentsGroup(){await this.$api.get(this.Meta.module+"/filter/group",((e,t)=>{200==t&&(this.group=e)}),(e=>{}))}}};var b=a(1639),p=a(7817),m=a(900),g=a(5714),c=a(7220),w=a(335),y=a(9984),f=a.n(y);const $=(0,b.Z)(u,[["render",r]]),M=$;f()(u,"components",{QTabs:p.Z,QTab:m.Z,QTable:g.Z,QTd:c.Z,QImg:w.Z})}}]);