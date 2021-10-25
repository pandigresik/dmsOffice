(self.webpackChunk=self.webpackChunk||[]).push([[751],{8061:(e,t,n)=>{"use strict";n.d(t,{ZP:()=>K});var r=n(6994),i=n.n(r),o=n(3254),a={insert:"head",singleton:!1};i()(o.Z,a);o.Z.locals;var s=n(5661),l=n(7098),c=n(3531),d=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.getKeyInfo=function(){return{allDay:{},timed:{}}},t.prototype.getKeysForDateSpan=function(e){return e.allDay?["allDay"]:["timed"]},t.prototype.getKeysForEventDef=function(e){return e.allDay?(0,s.gRm)(e)?["timed","allDay"]:["allDay"]:["timed"]},t}(s.qX1),f=(0,s.SPZ)({hour:"numeric",minute:"2-digit",omitZeroMinute:!0,meridiem:"short"});function u(e){var t=["fc-timegrid-slot","fc-timegrid-slot-label",e.isLabeled?"fc-scrollgrid-shrink":"fc-timegrid-slot-minor"];return(0,s.azq)(s.Yh$.Consumer,null,(function(n){if(!e.isLabeled)return(0,s.azq)("td",{className:t.join(" "),"data-time":e.isoTimeStr});var r=n.dateEnv,i=n.options,o=n.viewApi,a=null==i.slotLabelFormat?f:Array.isArray(i.slotLabelFormat)?(0,s.SPZ)(i.slotLabelFormat[0]):(0,s.SPZ)(i.slotLabelFormat),l={level:0,time:e.time,date:r.toDate(e.date),view:o,text:r.format(e.date,a)};return(0,s.azq)(s.QJ3,{hookProps:l,classNames:i.slotLabelClassNames,content:i.slotLabelContent,defaultContent:p,didMount:i.slotLabelDidMount,willUnmount:i.slotLabelWillUnmount},(function(n,r,i,o){return(0,s.azq)("td",{ref:n,className:t.concat(r).join(" "),"data-time":e.isoTimeStr},(0,s.azq)("div",{className:"fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame"},(0,s.azq)("div",{className:"fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion",ref:i},o)))}))}))}function p(e){return e.text}var h=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.render=function(){return this.props.slatMetas.map((function(e){return(0,s.azq)("tr",{key:e.key},(0,s.azq)(u,(0,l.pi)({},e)))}))},t}(s.H6J),v=(0,s.SPZ)({week:"short"}),g=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.allDaySplitter=new d,t.headerElRef=(0,s.VfA)(),t.rootElRef=(0,s.VfA)(),t.scrollerElRef=(0,s.VfA)(),t.state={slatCoords:null},t.handleScrollTopRequest=function(e){var n=t.scrollerElRef.current;n&&(n.scrollTop=e)},t.renderHeadAxis=function(e,n){void 0===n&&(n="");var r=t.context.options,i=t.props.dateProfile.renderRange,o=(0,s.MUz)(i.start,i.end),a=r.navLinks&&1===o?{"data-navlink":(0,s.Euv)(i.start,"week"),tabIndex:0}:{};return r.weekNumbers&&"day"===e?(0,s.azq)(s.QOi,{date:i.start,defaultFormat:v},(function(e,t,r,i){return(0,s.azq)("th",{ref:e,className:["fc-timegrid-axis","fc-scrollgrid-shrink"].concat(t).join(" ")},(0,s.azq)("div",{className:"fc-timegrid-axis-frame fc-scrollgrid-shrink-frame fc-timegrid-axis-frame-liquid",style:{height:n}},(0,s.azq)("a",(0,l.pi)({ref:r,className:"fc-timegrid-axis-cushion fc-scrollgrid-shrink-cushion fc-scrollgrid-sync-inner"},a),i)))})):(0,s.azq)("th",{className:"fc-timegrid-axis"},(0,s.azq)("div",{className:"fc-timegrid-axis-frame",style:{height:n}}))},t.renderTableRowAxis=function(e){var n=t.context,r=n.options,i=n.viewApi,o={text:r.allDayText,view:i};return(0,s.azq)(s.QJ3,{hookProps:o,classNames:r.allDayClassNames,content:r.allDayContent,defaultContent:m,didMount:r.allDayDidMount,willUnmount:r.allDayWillUnmount},(function(t,n,r,i){return(0,s.azq)("td",{ref:t,className:["fc-timegrid-axis","fc-scrollgrid-shrink"].concat(n).join(" ")},(0,s.azq)("div",{className:"fc-timegrid-axis-frame fc-scrollgrid-shrink-frame"+(null==e?" fc-timegrid-axis-frame-liquid":""),style:{height:e}},(0,s.azq)("span",{className:"fc-timegrid-axis-cushion fc-scrollgrid-shrink-cushion fc-scrollgrid-sync-inner",ref:r},i)))}))},t.handleSlatCoords=function(e){t.setState({slatCoords:e})},t}return(0,l.ZT)(t,e),t.prototype.renderSimpleLayout=function(e,t,n){var r=this.context,i=this.props,o=[],a=(0,s.Q8U)(r.options);return e&&o.push({type:"header",key:"header",isSticky:a,chunk:{elRef:this.headerElRef,tableClassName:"fc-col-header",rowContent:e}}),t&&(o.push({type:"body",key:"all-day",chunk:{content:t}}),o.push({type:"body",key:"all-day-divider",outerContent:(0,s.azq)("tr",{className:"fc-scrollgrid-section"},(0,s.azq)("td",{className:"fc-timegrid-divider "+r.theme.getClass("tableCellShaded")}))})),o.push({type:"body",key:"body",liquid:!0,expandRows:Boolean(r.options.expandRows),chunk:{scrollerElRef:this.scrollerElRef,content:n}}),(0,s.azq)(s.xS$,{viewSpec:r.viewSpec,elRef:this.rootElRef},(function(e,t){return(0,s.azq)("div",{className:["fc-timegrid"].concat(t).join(" "),ref:e},(0,s.azq)(s.Oh2,{liquid:!i.isHeightAuto&&!i.forPrint,collapsibleWidth:i.forPrint,cols:[{width:"shrink"}],sections:o}))}))},t.prototype.renderHScrollLayout=function(e,t,n,r,i,o,a){var l=this,c=this.context.pluginHooks.scrollGridImpl;if(!c)throw new Error("No ScrollGrid implementation");var d=this.context,f=this.props,u=!f.forPrint&&(0,s.Q8U)(d.options),p=!f.forPrint&&(0,s.PZw)(d.options),v=[];e&&v.push({type:"header",key:"header",isSticky:u,syncRowHeights:!0,chunks:[{key:"axis",rowContent:function(e){return(0,s.azq)("tr",null,l.renderHeadAxis("day",e.rowSyncHeights[0]))}},{key:"cols",elRef:this.headerElRef,tableClassName:"fc-col-header",rowContent:e}]}),t&&(v.push({type:"body",key:"all-day",syncRowHeights:!0,chunks:[{key:"axis",rowContent:function(e){return(0,s.azq)("tr",null,l.renderTableRowAxis(e.rowSyncHeights[0]))}},{key:"cols",content:t}]}),v.push({key:"all-day-divider",type:"body",outerContent:(0,s.azq)("tr",{className:"fc-scrollgrid-section"},(0,s.azq)("td",{colSpan:2,className:"fc-timegrid-divider "+d.theme.getClass("tableCellShaded")}))}));var g=d.options.nowIndicator;return v.push({type:"body",key:"body",liquid:!0,expandRows:Boolean(d.options.expandRows),chunks:[{key:"axis",content:function(e){return(0,s.azq)("div",{className:"fc-timegrid-axis-chunk"},(0,s.azq)("table",{style:{height:e.expandRows?e.clientHeight:""}},e.tableColGroupNode,(0,s.azq)("tbody",null,(0,s.azq)(h,{slatMetas:o}))),(0,s.azq)("div",{className:"fc-timegrid-now-indicator-container"},(0,s.azq)(s.wh8,{unit:g?"minute":"day"},(function(e){var t=g&&a&&a.safeComputeTop(e);return"number"==typeof t?(0,s.azq)(s.AOy,{isAxis:!0,date:e},(function(e,n,r,i){return(0,s.azq)("div",{ref:e,className:["fc-timegrid-now-indicator-arrow"].concat(n).join(" "),style:{top:t}},i)})):null}))))}},{key:"cols",scrollerElRef:this.scrollerElRef,content:n}]}),p&&v.push({key:"footer",type:"footer",isSticky:!0,chunks:[{key:"axis",content:s.Hbc},{key:"cols",content:s.Hbc}]}),(0,s.azq)(s.xS$,{viewSpec:d.viewSpec,elRef:this.rootElRef},(function(e,t){return(0,s.azq)("div",{className:["fc-timegrid"].concat(t).join(" "),ref:e},(0,s.azq)(c,{liquid:!f.isHeightAuto&&!f.forPrint,collapsibleWidth:!1,colGroups:[{width:"shrink",cols:[{width:"shrink"}]},{cols:[{span:r,minWidth:i}]}],sections:v}))}))},t.prototype.getAllDayMaxEventProps=function(){var e=this.context.options,t=e.dayMaxEvents,n=e.dayMaxEventRows;return!0!==t&&!0!==n||(t=void 0,n=5),{dayMaxEvents:t,dayMaxEventRows:n}},t}(s.IdW);function m(e){return e.text}var y=function(){function e(e,t,n){this.positions=e,this.dateProfile=t,this.slotDuration=n}return e.prototype.safeComputeTop=function(e){var t=this.dateProfile;if((0,s.mCA)(t.currentRange,e)){var n=(0,s.b7Q)(e),r=e.valueOf()-n.valueOf();if(r>=(0,s.TTZ)(t.slotMinTime)&&r<(0,s.TTZ)(t.slotMaxTime))return this.computeTimeTop((0,s.Pvs)(r))}return null},e.prototype.computeDateTop=function(e,t){return t||(t=(0,s.b7Q)(e)),this.computeTimeTop((0,s.Pvs)(e.valueOf()-t.valueOf()))},e.prototype.computeTimeTop=function(e){var t,n,r=this.positions,i=this.dateProfile,o=r.els.length,a=(e.milliseconds-(0,s.TTZ)(i.slotMinTime))/(0,s.TTZ)(this.slotDuration);return a=Math.max(0,a),a=Math.min(o,a),t=Math.floor(a),n=a-(t=Math.min(t,o-1)),r.tops[t]+r.getHeight(t)*n},e}(),x=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this.props,t=this.context,n=t.options,r=e.slatElRefs;return(0,s.azq)("tbody",null,e.slatMetas.map((function(i,o){var a={time:i.time,date:t.dateEnv.toDate(i.date),view:t.viewApi},c=["fc-timegrid-slot","fc-timegrid-slot-lane",i.isLabeled?"":"fc-timegrid-slot-minor"];return(0,s.azq)("tr",{key:i.key,ref:r.createRef(i.key)},e.axis&&(0,s.azq)(u,(0,l.pi)({},i)),(0,s.azq)(s.QJ3,{hookProps:a,classNames:n.slotLaneClassNames,content:n.slotLaneContent,didMount:n.slotLaneDidMount,willUnmount:n.slotLaneWillUnmount},(function(e,t,n,r){return(0,s.azq)("td",{ref:e,className:c.concat(t).join(" "),"data-time":i.isoTimeStr},r)})))})))},t}(s.H6J),b=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.rootElRef=(0,s.VfA)(),t.slatElRefs=new s.lAU,t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this.props,t=this.context;return(0,s.azq)("div",{className:"fc-timegrid-slots",ref:this.rootElRef},(0,s.azq)("table",{className:t.theme.getClass("table"),style:{minWidth:e.tableMinWidth,width:e.clientWidth,height:e.minHeight}},e.tableColGroupNode,(0,s.azq)(x,{slatElRefs:this.slatElRefs,axis:e.axis,slatMetas:e.slatMetas})))},t.prototype.componentDidMount=function(){this.updateSizing()},t.prototype.componentDidUpdate=function(){this.updateSizing()},t.prototype.componentWillUnmount=function(){this.props.onCoords&&this.props.onCoords(null)},t.prototype.updateSizing=function(){var e,t=this.context,n=this.props;n.onCoords&&null!==n.clientWidth&&(this.rootElRef.current.offsetHeight&&n.onCoords(new y(new s.zIV(this.rootElRef.current,(e=this.slatElRefs.currentMap,n.slatMetas.map((function(t){return e[t.key]}))),!1,!0),this.props.dateProfile,t.options.slotDuration)))},t}(s.H6J);function S(e,t){var n,r=[];for(n=0;n<t;n+=1)r.push([]);if(e)for(n=0;n<e.length;n+=1)r[e[n].col].push(e[n]);return r}function k(e,t){var n=[];if(e){for(a=0;a<t;a+=1)n[a]={affectedInstances:e.affectedInstances,isEvent:e.isEvent,segs:[]};for(var r=0,i=e.segs;r<i.length;r++){var o=i[r];n[o.col].segs.push(o)}}else for(var a=0;a<t;a+=1)n[a]=null;return n}var z=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.rootElRef=(0,s.VfA)(),t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this,t=this.props;return(0,s.azq)(s.ygx,{allDayDate:null,moreCnt:t.hiddenSegs.length,allSegs:t.hiddenSegs,hiddenSegs:t.hiddenSegs,alignmentElRef:this.rootElRef,defaultContent:w,extraDateSpan:t.extraDateSpan,dateProfile:t.dateProfile,todayRange:t.todayRange,popoverContent:function(){return A(t.hiddenSegs,t)}},(function(n,r,i,o,a){return(0,s.azq)("a",{ref:function(t){(0,s.k$v)(n,t),(0,s.k$v)(e.rootElRef,t)},className:["fc-timegrid-more-link"].concat(r).join(" "),style:{top:t.top,bottom:t.bottom},onClick:a},(0,s.azq)("div",{ref:i,className:"fc-timegrid-more-link-inner fc-sticky"},o))}))},t}(s.H6J);function w(e){return e.shortText}function R(e,t,n){var r=new s.KxW;null!=t&&(r.strictOrder=t),null!=n&&(r.maxStackCnt=n);var i,o,a,c=r.addSegs(e),d=(0,s.AVF)(c),f=function(e){var t=e.entriesByLevel,n=T((function(e,t){return e+":"+t}),(function(r,i){var o=C(function(e,t,n){for(var r=e.levelCoords,i=e.entriesByLevel,o=i[t][n],a=r[t]+o.thickness,l=r.length,c=t;c<l&&r[c]<a;c+=1);for(;c<l;c+=1){for(var d=i[c],f=void 0,u=(0,s.ry4)(d,o.span.start,s.VTw),p=u[0]+u[1],h=p;(f=d[h])&&f.span.start<o.span.end;)h+=1;if(p<h)return{level:c,lateralStart:p,lateralEnd:h}}return null}(e,r,i),n),a=t[r][i];return[(0,l.pi)((0,l.pi)({},a),{nextLevelNodes:o[0]}),a.thickness+o[1]]}));return C(t.length?{level:0,lateralStart:0,lateralEnd:t[0].length}:null,n)[0]}(r);return i=f,o=1,a=T((function(e,t,n){return(0,s.oBR)(e)}),(function(e,t,n){var r,i=e.nextLevelNodes,s=e.thickness,c=s+n,d=s/c,f=[];if(i.length)for(var u=0,p=i;u<p.length;u++){var h=p[u];if(void 0===r)r=(v=a(h,t,c))[0],f.push(v[1]);else{var v=a(h,r,0);f.push(v[1])}}else r=o;var g=(r-t)*d;return[r-g,(0,l.pi)((0,l.pi)({},e),{thickness:g,nextLevelNodes:f})]})),{segRects:function(e){var t=[],n=T((function(e,t,n){return(0,s.oBR)(e)}),(function(e,n,i){var o=(0,l.pi)((0,l.pi)({},e),{levelCoord:n,stackDepth:i,stackForward:0});return t.push(o),o.stackForward=r(e.nextLevelNodes,n+e.thickness,i+1)+1}));function r(e,t,r){for(var i=0,o=0,a=e;o<a.length;o++){var s=a[o];i=Math.max(n(s,t,r),i)}return i}return r(e,0,0),t}(f=i.map((function(e){return a(e,0,0)[1]}))),hiddenGroups:d}}function C(e,t){if(!e)return[[],0];for(var n=e.level,r=e.lateralStart,i=e.lateralEnd,o=r,a=[];o<i;)a.push(t(n,o)),o+=1;return a.sort(q),[a.map(D),a[0][1]]}function q(e,t){return t[1]-e[1]}function D(e){return e[0]}function T(e,t){var n={};return function(){for(var r=[],i=0;i<arguments.length;i++)r[i]=arguments[i];var o=e.apply(void 0,r);return o in n?n[o]:n[o]=t.apply(void 0,r)}}function N(e,t,n,r){void 0===n&&(n=null),void 0===r&&(r=0);var i=[];if(n)for(var o=0;o<e.length;o+=1){var a=e[o],s=n.computeDateTop(a.start,t),l=Math.max(s+(r||0),n.computeDateTop(a.end,t));i.push({start:Math.round(s),end:Math.round(l)})}return i}var P=(0,s.SPZ)({hour:"numeric",minute:"2-digit",meridiem:!1}),E=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=["fc-timegrid-event","fc-v-event"];return this.props.isShort&&e.push("fc-timegrid-event-short"),(0,s.azq)(s.h2k,(0,l.pi)({},this.props,{defaultTimeFormat:P,extraClassNames:e}))},t}(s.H6J),H=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this.props;return(0,s.azq)(s.R_3,{date:e.date,dateProfile:e.dateProfile,todayRange:e.todayRange,extraHookProps:e.extraHookProps},(function(e,t){return t&&(0,s.azq)("div",{className:"fc-timegrid-col-misc",ref:e},t)}))},t}(s.H6J),M=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.sortEventSegs=(0,s.HPs)(s.hak),t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this,t=this.props,n=this.context,r=n.options.selectMirror,i=t.eventDrag&&t.eventDrag.segs||t.eventResize&&t.eventResize.segs||r&&t.dateSelectionSegs||[],o=t.eventDrag&&t.eventDrag.affectedInstances||t.eventResize&&t.eventResize.affectedInstances||{},a=this.sortEventSegs(t.fgEventSegs,n.options.eventOrder);return(0,s.azq)(s.hJ8,{elRef:t.elRef,date:t.date,dateProfile:t.dateProfile,todayRange:t.todayRange,extraHookProps:t.extraHookProps},(function(n,c,d){return(0,s.azq)("td",(0,l.pi)({ref:n,className:["fc-timegrid-col"].concat(c,t.extraClassNames||[]).join(" ")},d,t.extraDataAttrs),(0,s.azq)("div",{className:"fc-timegrid-col-frame"},(0,s.azq)("div",{className:"fc-timegrid-col-bg"},e.renderFillSegs(t.businessHourSegs,"non-business"),e.renderFillSegs(t.bgEventSegs,"bg-event"),e.renderFillSegs(t.dateSelectionSegs,"highlight")),(0,s.azq)("div",{className:"fc-timegrid-col-events"},e.renderFgSegs(a,o,!1,!1,!1)),(0,s.azq)("div",{className:"fc-timegrid-col-events"},e.renderFgSegs(i,{},Boolean(t.eventDrag),Boolean(t.eventResize),Boolean(r))),(0,s.azq)("div",{className:"fc-timegrid-now-indicator-container"},e.renderNowIndicator(t.nowIndicatorSegs)),(0,s.azq)(H,{date:t.date,dateProfile:t.dateProfile,todayRange:t.todayRange,extraHookProps:t.extraHookProps})))}))},t.prototype.renderFgSegs=function(e,t,n,r,i){var o=this.props;return o.forPrint?A(e,o):this.renderPositionedFgSegs(e,t,n,r,i)},t.prototype.renderPositionedFgSegs=function(e,t,n,r,i){var o=this,a=this.context.options,c=a.eventMaxStack,d=a.eventShortHeight,f=a.eventOrderStrict,u=a.eventMinHeight,p=this.props,h=p.date,v=p.slatCoords,g=p.eventSelection,m=p.todayRange,y=p.nowDate,x=n||r||i,b=function(e,t,n,r){for(var i=[],o=[],a=0;a<e.length;a+=1){var s=t[a];s?i.push({index:a,thickness:1,span:s}):o.push(e[a])}for(var l=R(i,n,r),c=l.segRects,d=l.hiddenGroups,f=[],u=0,p=c;u<p.length;u++){var h=p[u];f.push({seg:e[h.index],rect:h})}for(var v=0,g=o;v<g.length;v++){var m=g[v];f.push({seg:m,rect:null})}return{segPlacements:f,hiddenGroups:d}}(e,N(e,h,v,u),f,c),S=b.segPlacements,k=b.hiddenGroups;return(0,s.azq)(s.HYg,null,this.renderHiddenGroups(k,e),S.map((function(e){var a=e.seg,c=e.rect,f=a.eventRange.instance.instanceId,u=x||Boolean(!t[f]&&c),p=I(c&&c.span),h=!x&&c?o.computeSegHStyle(c):{left:0,right:0},v=Boolean(c)&&c.stackForward>0,b=Boolean(c)&&c.span.end-c.span.start<d;return(0,s.azq)("div",{className:"fc-timegrid-event-harness"+(v?" fc-timegrid-event-harness-inset":""),key:f,style:(0,l.pi)((0,l.pi)({visibility:u?"":"hidden"},p),h)},(0,s.azq)(E,(0,l.pi)({seg:a,isDragging:n,isResizing:r,isDateSelecting:i,isSelected:f===g,isShort:b},(0,s.jHR)(a,m,y))))})))},t.prototype.renderHiddenGroups=function(e,t){var n=this.props,r=n.extraDateSpan,i=n.dateProfile,o=n.todayRange,a=n.nowDate,l=n.eventSelection,c=n.eventDrag,d=n.eventResize;return(0,s.azq)(s.HYg,null,e.map((function(e){var n,f,u=I(e.span),p=(n=e.entries,f=t,n.map((function(e){return f[e.index]})));return(0,s.azq)(z,{key:(0,s.dS)((0,s.VV4)(p)),hiddenSegs:p,top:u.top,bottom:u.bottom,extraDateSpan:r,dateProfile:i,todayRange:o,nowDate:a,eventSelection:l,eventDrag:c,eventResize:d})})))},t.prototype.renderFillSegs=function(e,t){var n=this.props,r=this.context,i=N(e,n.date,n.slatCoords,r.options.eventMinHeight).map((function(r,i){var o=e[i];return(0,s.azq)("div",{key:(0,s.rRV)(o.eventRange),className:"fc-timegrid-bg-harness",style:I(r)},"bg-event"===t?(0,s.azq)(s.I_K,(0,l.pi)({seg:o},(0,s.jHR)(o,n.todayRange,n.nowDate))):(0,s.MA3)(t))}));return(0,s.azq)(s.HYg,null,i)},t.prototype.renderNowIndicator=function(e){var t=this.props,n=t.slatCoords,r=t.date;return n?e.map((function(e,t){return(0,s.azq)(s.AOy,{isAxis:!1,date:r,key:t},(function(t,i,o,a){return(0,s.azq)("div",{ref:t,className:["fc-timegrid-now-indicator-line"].concat(i).join(" "),style:{top:n.computeDateTop(e.start,r)}},a)}))})):null},t.prototype.computeSegHStyle=function(e){var t,n,r=this.context,i=r.isRtl,o=r.options.slotEventOverlap,a=e.levelCoord,s=e.levelCoord+e.thickness;o&&(s=Math.min(1,a+2*(s-a))),i?(t=1-s,n=a):(t=a,n=1-s);var l={zIndex:e.stackDepth+1,left:100*t+"%",right:100*n+"%"};return o&&!e.stackForward&&(l[i?"marginLeft":"marginRight"]=20),l},t}(s.H6J);function A(e,t){var n=t.todayRange,r=t.nowDate,i=t.eventSelection,o=t.eventDrag,a=t.eventResize,c=(o?o.affectedInstances:null)||(a?a.affectedInstances:null)||{};return(0,s.azq)(s.HYg,null,e.map((function(e){var t=e.eventRange.instance.instanceId;return(0,s.azq)("div",{key:t,style:{visibility:c[t]?"hidden":""}},(0,s.azq)(E,(0,l.pi)({seg:e,isDragging:!1,isResizing:!1,isDateSelecting:!1,isSelected:t===i,isShort:!1},(0,s.jHR)(e,n,r))))})))}function I(e){return e?{top:e.start,bottom:-e.end}:{top:"",bottom:""}}var O=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.splitFgEventSegs=(0,s.HPs)(S),t.splitBgEventSegs=(0,s.HPs)(S),t.splitBusinessHourSegs=(0,s.HPs)(S),t.splitNowIndicatorSegs=(0,s.HPs)(S),t.splitDateSelectionSegs=(0,s.HPs)(S),t.splitEventDrag=(0,s.HPs)(k),t.splitEventResize=(0,s.HPs)(k),t.rootElRef=(0,s.VfA)(),t.cellElRefs=new s.lAU,t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this,t=this.props,n=this.context.options.nowIndicator&&t.slatCoords&&t.slatCoords.safeComputeTop(t.nowDate),r=t.cells.length,i=this.splitFgEventSegs(t.fgEventSegs,r),o=this.splitBgEventSegs(t.bgEventSegs,r),a=this.splitBusinessHourSegs(t.businessHourSegs,r),l=this.splitNowIndicatorSegs(t.nowIndicatorSegs,r),c=this.splitDateSelectionSegs(t.dateSelectionSegs,r),d=this.splitEventDrag(t.eventDrag,r),f=this.splitEventResize(t.eventResize,r);return(0,s.azq)("div",{className:"fc-timegrid-cols",ref:this.rootElRef},(0,s.azq)("table",{style:{minWidth:t.tableMinWidth,width:t.clientWidth}},t.tableColGroupNode,(0,s.azq)("tbody",null,(0,s.azq)("tr",null,t.axis&&(0,s.azq)("td",{className:"fc-timegrid-col fc-timegrid-axis"},(0,s.azq)("div",{className:"fc-timegrid-col-frame"},(0,s.azq)("div",{className:"fc-timegrid-now-indicator-container"},"number"==typeof n&&(0,s.azq)(s.AOy,{isAxis:!0,date:t.nowDate},(function(e,t,r,i){return(0,s.azq)("div",{ref:e,className:["fc-timegrid-now-indicator-arrow"].concat(t).join(" "),style:{top:n}},i)}))))),t.cells.map((function(n,r){return(0,s.azq)(M,{key:n.key,elRef:e.cellElRefs.createRef(n.key),dateProfile:t.dateProfile,date:n.date,nowDate:t.nowDate,todayRange:t.todayRange,extraHookProps:n.extraHookProps,extraDataAttrs:n.extraDataAttrs,extraClassNames:n.extraClassNames,extraDateSpan:n.extraDateSpan,fgEventSegs:i[r],bgEventSegs:o[r],businessHourSegs:a[r],nowIndicatorSegs:l[r],dateSelectionSegs:c[r],eventDrag:d[r],eventResize:f[r],slatCoords:t.slatCoords,eventSelection:t.eventSelection,forPrint:t.forPrint})}))))))},t.prototype.componentDidMount=function(){this.updateCoords()},t.prototype.componentDidUpdate=function(){this.updateCoords()},t.prototype.updateCoords=function(){var e,t=this.props;t.onColCoords&&null!==t.clientWidth&&t.onColCoords(new s.zIV(this.rootElRef.current,(e=this.cellElRefs.currentMap,t.cells.map((function(t){return e[t.key]}))),!0,!1))},t}(s.H6J);var W=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.processSlotOptions=(0,s.HPs)(F),t.state={slatCoords:null},t.handleRootEl=function(e){e?t.context.registerInteractiveComponent(t,{el:e,isHitComboAllowed:t.props.isHitComboAllowed}):t.context.unregisterInteractiveComponent(t)},t.handleScrollRequest=function(e){var n=t.props.onScrollTopRequest,r=t.state.slatCoords;if(n&&r){if(e.time){var i=r.computeTimeTop(e.time);(i=Math.ceil(i))&&(i+=1),n(i)}return!0}return!1},t.handleColCoords=function(e){t.colCoords=e},t.handleSlatCoords=function(e){t.setState({slatCoords:e}),t.props.onSlatCoords&&t.props.onSlatCoords(e)},t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this.props,t=this.state;return(0,s.azq)("div",{className:"fc-timegrid-body",ref:this.handleRootEl,style:{width:e.clientWidth,minWidth:e.tableMinWidth}},(0,s.azq)(b,{axis:e.axis,dateProfile:e.dateProfile,slatMetas:e.slatMetas,clientWidth:e.clientWidth,minHeight:e.expandRows?e.clientHeight:"",tableMinWidth:e.tableMinWidth,tableColGroupNode:e.axis?e.tableColGroupNode:null,onCoords:this.handleSlatCoords}),(0,s.azq)(O,{cells:e.cells,axis:e.axis,dateProfile:e.dateProfile,businessHourSegs:e.businessHourSegs,bgEventSegs:e.bgEventSegs,fgEventSegs:e.fgEventSegs,dateSelectionSegs:e.dateSelectionSegs,eventSelection:e.eventSelection,eventDrag:e.eventDrag,eventResize:e.eventResize,todayRange:e.todayRange,nowDate:e.nowDate,nowIndicatorSegs:e.nowIndicatorSegs,clientWidth:e.clientWidth,tableMinWidth:e.tableMinWidth,tableColGroupNode:e.tableColGroupNode,slatCoords:t.slatCoords,onColCoords:this.handleColCoords,forPrint:e.forPrint}))},t.prototype.componentDidMount=function(){this.scrollResponder=this.context.createScrollResponder(this.handleScrollRequest)},t.prototype.componentDidUpdate=function(e){this.scrollResponder.update(e.dateProfile!==this.props.dateProfile)},t.prototype.componentWillUnmount=function(){this.scrollResponder.detach()},t.prototype.queryHit=function(e,t){var n=this.context,r=n.dateEnv,i=n.options,o=this.colCoords,a=this.props.dateProfile,c=this.state.slatCoords,d=this.processSlotOptions(this.props.slotDuration,i.snapDuration),f=d.snapDuration,u=d.snapsPerSlot,p=o.leftToIndex(e),h=c.positions.topToIndex(t);if(null!=p&&null!=h){var v=this.props.cells[p],g=c.positions.tops[h],m=c.positions.getHeight(h),y=(t-g)/m,x=h*u+Math.floor(y*u),b=this.props.cells[p].date,S=(0,s.nlJ)(a.slotMinTime,(0,s.uVS)(f,x)),k=r.add(b,S),z=r.add(k,f);return{dateProfile:a,dateSpan:(0,l.pi)({range:{start:k,end:z},allDay:!1},v.extraDateSpan),dayEl:o.els[p],rect:{left:o.lefts[p],right:o.rights[p],top:g,bottom:g+m},layer:0}}return null},t}(s.IdW);function F(e,t){var n=t||e,r=(0,s.ltK)(e,n);return null===r&&(n=e,r=1),{snapDuration:n,snapsPerSlot:r}}var G=function(e){function t(){return null!==e&&e.apply(this,arguments)||this}return(0,l.ZT)(t,e),t.prototype.sliceRange=function(e,t){for(var n=[],r=0;r<t.length;r+=1){var i=(0,s.cMs)(e,t[r]);i&&n.push({start:i.start,end:i.end,isStart:i.start.valueOf()===e.start.valueOf(),isEnd:i.end.valueOf()===e.end.valueOf(),col:r})}return n},t}(s.RVT),Z=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.buildDayRanges=(0,s.HPs)(V),t.slicer=new G,t.timeColsRef=(0,s.VfA)(),t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this,t=this.props,n=this.context,r=t.dateProfile,i=t.dayTableModel,o=n.options.nowIndicator,a=this.buildDayRanges(i,r,n.dateEnv);return(0,s.azq)(s.wh8,{unit:o?"minute":"day"},(function(c,d){return(0,s.azq)(W,(0,l.pi)({ref:e.timeColsRef},e.slicer.sliceProps(t,r,null,n,a),{forPrint:t.forPrint,axis:t.axis,dateProfile:r,slatMetas:t.slatMetas,slotDuration:t.slotDuration,cells:i.cells[0],tableColGroupNode:t.tableColGroupNode,tableMinWidth:t.tableMinWidth,clientWidth:t.clientWidth,clientHeight:t.clientHeight,expandRows:t.expandRows,nowDate:c,nowIndicatorSegs:o&&e.slicer.sliceNowDate(c,n,a),todayRange:d,onScrollTopRequest:t.onScrollTopRequest,onSlatCoords:t.onSlatCoords}))}))},t}(s.IdW);function V(e,t,n){for(var r=[],i=0,o=e.headerDates;i<o.length;i++){var a=o[i];r.push({start:n.add(a,t.slotMinTime),end:n.add(a,t.slotMaxTime)})}return r}var L=[{hours:1},{minutes:30},{minutes:15},{seconds:30},{seconds:15}];function j(e,t,n,r,i){for(var o=new Date(0),a=e,l=(0,s.Pvs)(0),c=n||function(e){var t,n,r;for(t=L.length-1;t>=0;t-=1)if(n=(0,s.Pvs)(L[t]),null!==(r=(0,s.ltK)(n,e))&&r>1)return n;return e}(r),d=[];(0,s.TTZ)(a)<(0,s.TTZ)(t);){var f=i.add(o,a),u=null!==(0,s.ltK)(l,c);d.push({date:f,time:a,key:f.toISOString(),isoTimeStr:(0,s.Zjx)(f),isLabeled:u}),a=(0,s.nlJ)(a,r),l=(0,s.nlJ)(l,r)}return d}var J=function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.buildTimeColsModel=(0,s.HPs)(U),t.buildSlatMetas=(0,s.HPs)(j),t}return(0,l.ZT)(t,e),t.prototype.render=function(){var e=this,t=this.context,n=t.options,r=t.dateEnv,i=t.dateProfileGenerator,o=this.props,a=o.dateProfile,d=this.buildTimeColsModel(a,i),f=this.allDaySplitter.splitProps(o),u=this.buildSlatMetas(a.slotMinTime,a.slotMaxTime,n.slotLabelInterval,n.slotDuration,r),p=n.dayMinWidth,h=!p,v=p,g=n.dayHeaders&&(0,s.azq)(s.lR3,{dates:d.headerDates,dateProfile:a,datesRepDistinctDays:!0,renderIntro:h?this.renderHeadAxis:null}),m=!1!==n.allDaySlot&&function(t){return(0,s.azq)(c.iz,(0,l.pi)({},f.allDay,{dateProfile:a,dayTableModel:d,nextDayThreshold:n.nextDayThreshold,tableMinWidth:t.tableMinWidth,colGroupNode:t.tableColGroupNode,renderRowIntro:h?e.renderTableRowAxis:null,showWeekNumbers:!1,expandRows:!1,headerAlignElRef:e.headerElRef,clientWidth:t.clientWidth,clientHeight:t.clientHeight,forPrint:o.forPrint},e.getAllDayMaxEventProps()))},y=function(t){return(0,s.azq)(Z,(0,l.pi)({},f.timed,{dayTableModel:d,dateProfile:a,axis:h,slotDuration:n.slotDuration,slatMetas:u,forPrint:o.forPrint,tableColGroupNode:t.tableColGroupNode,tableMinWidth:t.tableMinWidth,clientWidth:t.clientWidth,clientHeight:t.clientHeight,onSlatCoords:e.handleSlatCoords,expandRows:t.expandRows,onScrollTopRequest:e.handleScrollTopRequest}))};return v?this.renderHScrollLayout(g,m,y,d.colCnt,p,u,this.state.slatCoords):this.renderSimpleLayout(g,m,y)},t}(g);function U(e,t){var n=new s.xB8(e.renderRange,t);return new s.xVj(n,!1)}var B={allDaySlot:Boolean};const K=(0,s.rxu)({initialView:"timeGridWeek",optionRefiners:B,views:{timeGrid:{component:J,usesMinMaxTime:!0,allDaySlot:!0,slotDuration:"00:30:00",slotEventOverlap:!0},timeGridDay:{type:"timeGrid",duration:{days:1}},timeGridWeek:{type:"timeGrid",duration:{weeks:1}}}})},1833:(e,t,n)=>{var r,i,o;i=[n(7346)],void 0===(o="function"==typeof(r=function(e){"use strict";var t=/\r?\n/g,n=/^(?:submit|button|image|reset|file)$/i,r=/^(?:input|select|textarea|keygen)/i,i=/^(?:checkbox|radio)$/i;e.fn.serializeJSON=function(t){var n=e.serializeJSON,r=this,i=n.setupOpts(t),o=e.extend({},i.defaultTypes,i.customTypes),a=n.serializeArray(r,i),s={};return e.each(a,(function(t,r){var a=r.name,l=e(r.el).attr("data-value-type");if(!l&&!i.disableColonTypes){var c=n.splitType(r.name);a=c[0],l=c[1]}if("skip"!==l){l||(l=i.defaultType);var d=n.applyTypeFunc(r.name,r.value,l,r.el,o);if(d||!n.shouldSkipFalsy(r.name,a,l,r.el,i)){var f=n.splitInputNameIntoKeysArray(a);n.deepSet(s,f,d,i)}}})),s},e.serializeJSON={defaultOptions:{},defaultBaseOptions:{checkboxUncheckedValue:void 0,useIntKeysAsArrayIndex:!1,skipFalsyValuesForTypes:[],skipFalsyValuesForFields:[],disableColonTypes:!1,customTypes:{},defaultTypes:{string:function(e){return String(e)},number:function(e){return Number(e)},boolean:function(e){return-1===["false","null","undefined","","0"].indexOf(e)},null:function(e){return-1===["false","null","undefined","","0"].indexOf(e)?e:null},array:function(e){return JSON.parse(e)},object:function(e){return JSON.parse(e)},skip:null},defaultType:"string"},setupOpts:function(t){null==t&&(t={});var n=e.serializeJSON,r=["checkboxUncheckedValue","useIntKeysAsArrayIndex","skipFalsyValuesForTypes","skipFalsyValuesForFields","disableColonTypes","customTypes","defaultTypes","defaultType"];for(var i in t)if(-1===r.indexOf(i))throw new Error("serializeJSON ERROR: invalid option '"+i+"'. Please use one of "+r.join(", "));return e.extend({},n.defaultBaseOptions,n.defaultOptions,t)},serializeArray:function(o,a){null==a&&(a={});var s=e.serializeJSON;return o.map((function(){var t=e.prop(this,"elements");return t?e.makeArray(t):this})).filter((function(){var t=e(this),o=this.type;return this.name&&!t.is(":disabled")&&r.test(this.nodeName)&&!n.test(o)&&(this.checked||!i.test(o)||null!=s.getCheckboxUncheckedValue(t,a))})).map((function(n,r){var o=e(this),l=o.val(),d=this.type;return null==l?null:(i.test(d)&&!this.checked&&(l=s.getCheckboxUncheckedValue(o,a)),c(l)?e.map(l,(function(e){return{name:r.name,value:e.replace(t,"\r\n"),el:r}})):{name:r.name,value:l.replace(t,"\r\n"),el:r})})).get()},getCheckboxUncheckedValue:function(e,t){var n=e.attr("data-unchecked-value");return null==n&&(n=t.checkboxUncheckedValue),n},applyTypeFunc:function(e,t,n,r,i){var a=i[n];if(!a)throw new Error("serializeJSON ERROR: Invalid type "+n+" found in input name '"+e+"', please use one of "+o(i).join(", "));return a(t,r)},splitType:function(e){var t=e.split(":");if(t.length>1){var n=t.pop();return[t.join(":"),n]}return[e,""]},shouldSkipFalsy:function(t,n,r,i,o){var a=e(i).attr("data-skip-falsy");if(null!=a)return"false"!==a;var s=o.skipFalsyValuesForFields;if(s&&(-1!==s.indexOf(n)||-1!==s.indexOf(t)))return!0;var l=o.skipFalsyValuesForTypes;return!(!l||-1===l.indexOf(r))},splitInputNameIntoKeysArray:function(t){var n=t.split("[");return""===(n=e.map(n,(function(e){return e.replace(/\]/g,"")})))[0]&&n.shift(),n},deepSet:function(t,n,r,i){null==i&&(i={});var o=e.serializeJSON;if(s(t))throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined");if(!n||0===n.length)throw new Error("ArgumentError: param 'keys' expected to be an array with least one element");var d=n[0];if(1!==n.length){var f=n[1],u=n.slice(1);if(""===d){var p=t.length-1,h=t[p];d=a(h)&&s(o.deepGet(h,u))?p:p+1}""===f||i.useIntKeysAsArrayIndex&&l(f)?!s(t[d])&&c(t[d])||(t[d]=[]):!s(t[d])&&a(t[d])||(t[d]={}),o.deepSet(t[d],u,r,i)}else""===d?t.push(r):t[d]=r},deepGet:function(t,n){var r=e.serializeJSON;if(s(t)||s(n)||0===n.length||!a(t)&&!c(t))return t;var i=n[0];if(""!==i){if(1===n.length)return t[i];var o=n.slice(1);return r.deepGet(t[i],o)}}};var o=function(e){if(Object.keys)return Object.keys(e);var t,n=[];for(t in e)n.push(t);return n},a=function(e){return e===Object(e)},s=function(e){return void 0===e},l=function(e){return/^[0-9]+$/.test(String(e))},c=Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)}})?r.apply(t,i):r)||(e.exports=o)},3254:(e,t,n)=>{"use strict";n.d(t,{Z:()=>o});var r=n(3125),i=n.n(r)()((function(e){return e[1]}));i.push([e.id,'.fc-v-event{background-color:#3788d8;background-color:var(--fc-event-bg-color,#3788d8);border:1px solid #3788d8;border:1px solid var(--fc-event-border-color,#3788d8);display:block}.fc-v-event .fc-event-main{color:#fff;color:var(--fc-event-text-color,#fff);height:100%}.fc-v-event .fc-event-main-frame{display:flex;flex-direction:column;height:100%}.fc-v-event .fc-event-time{flex-grow:0;flex-shrink:0;max-height:100%;overflow:hidden}.fc-v-event .fc-event-title-container{flex-grow:1;flex-shrink:1;min-height:0}.fc-v-event .fc-event-title{bottom:0;max-height:100%;overflow:hidden;top:0}.fc-v-event:not(.fc-event-start){border-top-left-radius:0;border-top-right-radius:0;border-top-width:0}.fc-v-event:not(.fc-event-end){border-bottom-left-radius:0;border-bottom-right-radius:0;border-bottom-width:0}.fc-v-event.fc-event-selected:before{left:-10px;right:-10px}.fc-v-event .fc-event-resizer-start{cursor:n-resize}.fc-v-event .fc-event-resizer-end{cursor:s-resize}.fc-v-event:not(.fc-event-selected) .fc-event-resizer{height:8px;height:var(--fc-event-resizer-thickness,8px);left:0;right:0}.fc-v-event:not(.fc-event-selected) .fc-event-resizer-start{top:-4px;top:calc(var(--fc-event-resizer-thickness, 8px)/-2)}.fc-v-event:not(.fc-event-selected) .fc-event-resizer-end{bottom:-4px;bottom:calc(var(--fc-event-resizer-thickness, 8px)/-2)}.fc-v-event.fc-event-selected .fc-event-resizer{left:50%;margin-left:-4px;margin-left:calc(var(--fc-event-resizer-dot-total-width, 8px)/-2)}.fc-v-event.fc-event-selected .fc-event-resizer-start{top:-4px;top:calc(var(--fc-event-resizer-dot-total-width, 8px)/-2)}.fc-v-event.fc-event-selected .fc-event-resizer-end{bottom:-4px;bottom:calc(var(--fc-event-resizer-dot-total-width, 8px)/-2)}.fc .fc-timegrid .fc-daygrid-body{z-index:2}.fc .fc-timegrid-divider{padding:0 0 2px}.fc .fc-timegrid-body{min-height:100%;position:relative;z-index:1}.fc .fc-timegrid-axis-chunk{position:relative}.fc .fc-timegrid-axis-chunk>table,.fc .fc-timegrid-slots{position:relative;z-index:1}.fc .fc-timegrid-slot{border-bottom:0;height:1.5em}.fc .fc-timegrid-slot:empty:before{content:"\\00a0"}.fc .fc-timegrid-slot-minor{border-top-style:dotted}.fc .fc-timegrid-slot-label-cushion{display:inline-block;white-space:nowrap}.fc .fc-timegrid-slot-label{vertical-align:middle}.fc .fc-timegrid-axis-cushion,.fc .fc-timegrid-slot-label-cushion{padding:0 4px}.fc .fc-timegrid-axis-frame-liquid{height:100%}.fc .fc-timegrid-axis-frame{align-items:center;display:flex;justify-content:flex-end;overflow:hidden}.fc .fc-timegrid-axis-cushion{flex-shrink:0;max-width:60px}.fc-direction-ltr .fc-timegrid-slot-label-frame{text-align:right}.fc-direction-rtl .fc-timegrid-slot-label-frame{text-align:left}.fc-liquid-hack .fc-timegrid-axis-frame-liquid{bottom:0;height:auto;left:0;position:absolute;right:0;top:0}.fc .fc-timegrid-col.fc-day-today{background-color:rgba(255,220,40,.15);background-color:var(--fc-today-bg-color,rgba(255,220,40,.15))}.fc .fc-timegrid-col-frame{min-height:100%;position:relative}.fc-liquid-hack .fc-timegrid-col-frame{height:auto}.fc-liquid-hack .fc-timegrid-col-frame,.fc-media-screen .fc-timegrid-cols{bottom:0;left:0;position:absolute;right:0;top:0}.fc-media-screen .fc-timegrid-cols>table{height:100%}.fc-media-screen .fc-timegrid-col-bg,.fc-media-screen .fc-timegrid-col-events,.fc-media-screen .fc-timegrid-now-indicator-container{left:0;position:absolute;right:0;top:0}.fc .fc-timegrid-col-bg{z-index:2}.fc .fc-timegrid-col-bg .fc-non-business{z-index:1}.fc .fc-timegrid-col-bg .fc-bg-event{z-index:2}.fc .fc-timegrid-col-bg .fc-highlight{z-index:3}.fc .fc-timegrid-bg-harness{left:0;position:absolute;right:0}.fc .fc-timegrid-col-events{z-index:3}.fc .fc-timegrid-now-indicator-container{bottom:0;overflow:hidden}.fc-direction-ltr .fc-timegrid-col-events{margin:0 2.5% 0 2px}.fc-direction-rtl .fc-timegrid-col-events{margin:0 2px 0 2.5%}.fc-timegrid-event-harness{position:absolute}.fc-timegrid-event-harness>.fc-timegrid-event{bottom:0;left:0;position:absolute;right:0;top:0}.fc-timegrid-event-harness-inset .fc-timegrid-event,.fc-timegrid-event.fc-event-mirror,.fc-timegrid-more-link{box-shadow:0 0 0 1px #fff;box-shadow:0 0 0 1px var(--fc-page-bg-color,#fff)}.fc-timegrid-event,.fc-timegrid-more-link{border-radius:3px;font-size:.85em;font-size:var(--fc-small-font-size,.85em)}.fc-timegrid-event{margin-bottom:1px}.fc-timegrid-event .fc-event-main{padding:1px 1px 0}.fc-timegrid-event .fc-event-time{font-size:.85em;font-size:var(--fc-small-font-size,.85em);margin-bottom:1px;white-space:nowrap}.fc-timegrid-event-short .fc-event-main-frame{flex-direction:row;overflow:hidden}.fc-timegrid-event-short .fc-event-time:after{content:"\\00a0-\\00a0"}.fc-timegrid-event-short .fc-event-title{font-size:.85em;font-size:var(--fc-small-font-size,.85em)}.fc-timegrid-more-link{background:#d0d0d0;background:var(--fc-more-link-bg-color,#d0d0d0);color:inherit;color:var(--fc-more-link-text-color,inherit);cursor:pointer;margin-bottom:1px;position:absolute;z-index:9999}.fc-timegrid-more-link-inner{padding:3px 2px;top:0}.fc-direction-ltr .fc-timegrid-more-link{right:0}.fc-direction-rtl .fc-timegrid-more-link{left:0}.fc .fc-timegrid-now-indicator-line{border:0 solid red;border-color:var(--fc-now-indicator-color,red);border-top:1px solid var(--fc-now-indicator-color,red);left:0;position:absolute;right:0;z-index:4}.fc .fc-timegrid-now-indicator-arrow{border-color:red;border-color:var(--fc-now-indicator-color,red);border-style:solid;margin-top:-5px;position:absolute;z-index:4}.fc-direction-ltr .fc-timegrid-now-indicator-arrow{border-bottom-color:transparent;border-top-color:transparent;border-width:5px 0 5px 6px;left:0}.fc-direction-rtl .fc-timegrid-now-indicator-arrow{border-bottom-color:transparent;border-top-color:transparent;border-width:5px 6px 5px 0;right:0}',""]);const o=i}}]);