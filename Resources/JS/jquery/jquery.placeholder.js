/**
 * jQuery.placeholder - Placeholder plugin for input fields
 * Written by Blair Mitchelmore (blair DOT mitchelmore AT gmail DOT com)
 * Licensed under the WTFPL (http://sam.zoy.org/wtfpl/).
 * Date: 2008/10/14
 *
 * @author Blair Mitchelmore
 * @version 1.0.1
 *
 **/
new function(a){a.fn.placeholder=function(b){b=b||{};var j=b.dataKey||"placeholderValue";var f=b.attr||"placeholder";var h=b.className||"placeholder";var k=b.values||[];var c=b.blockSubmit||false;var e=b.blankSubmit||false;var g=b.onSubmit||false;var i=b.value||"";var d=b.cursor_position||0;return this.filter(":input").each(function(l){a.data(this,j,k[l]||a(this).attr(f))}).each(function(){if(a.trim(a(this).val())===""){a(this).addClass(h).val(a.data(this,j))}}).focus(function(){if(a.trim(a(this).val())===a.data(this,j)){a(this).removeClass(h).val(i)}if(a.fn.setCursorPosition){a(this).setCursorPosition(d)}}).blur(function(){if(a.trim(a(this).val())===i){a(this).addClass(h).val(a.data(this,j))}}).each(function(l,m){if(c){new function(n){a(n.form).submit(function(){return a.trim(a(n).val())!=a.data(n,j)})}(m)}else{if(e){new function(n){a(n.form).submit(function(){if(a.trim(a(n).val())==a.data(n,j)){a(n).removeClass(h).val("")}return true})}(m)}else{if(g){new function(n){a(n.form).submit(g)}(m)}}}})}}(jQuery);
