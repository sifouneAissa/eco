import r from"./AdminLayout.6b400f1c.js";import h from"./Datatable.e67bce07.js";import{_ as s}from"./_plugin-vue_export-helper.cdc0426e.js";import{p as d,c as m,w as l,C as a,o as w,b as S,a as u}from"./app.af699bdb.js";import"./vue-multiselect.esm.19a791f2.js";/* empty css                                                                 */import"./NavBar.37e54ca8.js";import"./Notifications.2ade7db1.js";import"./SideBar.71dc7146.js";import"./LinkCard.642ac65e.js";import"./Footer.2e4b3411.js";import"./Update.1ee14483.js";import"./FilterBtns.bfc6c03a.js";import"./FilterBtns.d5a0a2ee.js";const c={components:{AdminLayout:r,Datatable:h},props:["datatableUrl","datatableColumns","datatableHeaders"],methods:{ShowEditModel:function(e){this.modelToUpdate=e},ShowShowModel:function(e){this.modelToShow=e},ShowDeleteModel:function(e){this.modelToDelete=e},ShowAddModel:function(){this.modelToAdd=!0},ShowDeletePage:function(e){console.log("this is delete action")},ShowShowPage:function(e){d.Inertia.visit(this.route(e.modal_ids.show,{id:e.id}))},ShowEditPage:function(e){d.Inertia.visit(this.route(e.modal_ids.edit,{id:e.id}))},resetModel:function(){this.modelToUpdate=null,this.modelToShow=null,this.modelToDelete=null,this.modelToAdd=null}},data(){return{modelToUpdate:null,modelToShow:null,modelToDelete:null,modelToAdd:null}},computed:{model:function(){return this.modelToUpdate!==null}}},f=u("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Orders ",-1);function p(e,_,t,b,M,o){const n=a("Datatable"),i=a("AdminLayout");return w(),m(i,{title:"Orders"},{header:l(()=>[f]),default:l(()=>[S(n,{Btns:"OrderFilterBtns",onShowEditPage:o.ShowEditPage,onShowShowPage:o.ShowShowPage,onShowDeletePage:o.ShowDeletePage,onShowAddModel:o.ShowAddModel,onShowDeleteModel:o.ShowDeleteModel,onShowShowModel:o.ShowShowModel,onShowEditModel:o.ShowEditModel,title:"Orders table",datatableHeaders:t.datatableHeaders,datatableColumns:t.datatableColumns,datatableUrl:t.datatableUrl},null,8,["onShowEditPage","onShowShowPage","onShowDeletePage","onShowAddModel","onShowDeleteModel","onShowShowModel","onShowEditModel","datatableHeaders","datatableColumns","datatableUrl"])]),_:1})}const L=s(c,[["render",p]]);export{L as default};
