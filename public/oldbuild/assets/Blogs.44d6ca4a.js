import w from"./AdminLayout.6b400f1c.js";import u from"./Datatable.e67bce07.js";import{p as t,c as n,w as i,C as l,o as m,b as S,j as c,a as g}from"./app.af699bdb.js";import _ from"./deleteBlog.7cdc5ac7.js";import{_ as f}from"./_plugin-vue_export-helper.cdc0426e.js";import"./NavBar.37e54ca8.js";import"./Notifications.2ade7db1.js";import"./SideBar.71dc7146.js";import"./LinkCard.642ac65e.js";import"./Footer.2e4b3411.js";import"./Update.1ee14483.js";import"./FilterBtns.bfc6c03a.js";import"./FilterBtns.d5a0a2ee.js";import"./Delete.a38c67ef.js";const M={components:{AdminLayout:w,Datatable:u,deleteBlog:_},props:["datatableUrl","datatableColumns","datatableHeaders"],methods:{ShowImagePage:function(e){t.Inertia.visit(this.route("admin.media.index",{model:e.model,model_id:e.model_id}))},ShowEditModel:function(e){this.modelToUpdate=e},ShowShowModel:function(e){this.modelToShow=e},ShowDeleteModel:function(e){console.log("check"),this.modelToDelete=e},ShowAddModel:function(){this.modelToAdd=!0},ShowEditPage:function(e){t.Inertia.visit(this.route(e.modal_ids.edit,{id:e.id}))},ShowShowPage:function(e){t.Inertia.visit(this.route(e.modal_ids.show,{id:e.id}))},ShowAddPage:function(e){t.Inertia.visit(this.route(e.modal_ids.add))},resetModel:function(){this.modelToUpdate=null,this.modelToShow=null,this.modelToDelete=null,this.modelToAdd=null}},data(){return{modelToUpdate:null,modelToShow:null,modelToDelete:null,modelToAdd:null}},computed:{model:function(){return this.modelToUpdate!==null}}},p=g("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Blogs ",-1);function b(e,P,d,T,a,o){const h=l("Datatable"),s=l("deleteBlog"),r=l("AdminLayout");return m(),n(r,{title:"Blogs"},{header:i(()=>[p]),default:i(()=>[S(h,{onShowImagePage:o.ShowImagePage,onShowShowPage:o.ShowShowPage,onShowEditPage:o.ShowEditPage,onShowAddPage:o.ShowAddPage,onShowAddModel:o.ShowAddModel,onShowDeleteModel:o.ShowDeleteModel,onShowShowModel:o.ShowShowModel,onShowEditModel:o.ShowEditModel,title:"Blogs table",datatableHeaders:d.datatableHeaders,datatableColumns:d.datatableColumns,datatableUrl:d.datatableUrl},null,8,["onShowImagePage","onShowShowPage","onShowEditPage","onShowAddPage","onShowAddModel","onShowDeleteModel","onShowShowModel","onShowEditModel","datatableHeaders","datatableColumns","datatableUrl"]),a.modelToDelete!=null?(m(),n(s,{key:0,onResetModel:o.resetModel,model:a.modelToDelete},null,8,["onResetModel","model"])):c("",!0)]),_:1})}const V=f(M,[["render",b]]);export{V as default};