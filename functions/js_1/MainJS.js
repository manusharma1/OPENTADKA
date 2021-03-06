///////////////////////////////////////////////////////////////////////////
//                                                                       //
// NOTICE OF COPYRIGHT  - DO NOT REMOVE THIS NOTICE                      //
//                                                                       //
// OPENTADKA FRAMEWORK											         //
//          http://www.opentadka.org                                     //
//                                                                       //
// Copyright (C) 2010 onwards  Manu Sharma  http://www.opentadka.org     //
//                                                                       //
// This program is free software; you can redistribute it and/or modify  //
// it under the terms of the GNU General Public License as published by  //
// the Free Software Foundation; either version 2 of the License, or     //
// (at your option) any later version.                                   //
//                                                                       //
// This program is distributed in the hope that it will be useful,       //
// but WITHOUT ANY WARRANTY; without even the implied warranty of        //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         //
// GNU General Public License for more details:                          //
//                                                                       //
//          http://www.gnu.org/copyleft/gpl.html                         //
//                                                                       //
//////////////////////////////////////////////////////////////////////////

var element;
var errvalue;
var returnvalue = true;
var checkboxgroupchecked = true;
var jsconditionvalue;
var jsfunction;
var jsfunctionvalue;

function JSElementTypeProcessor(elementtypeArray,jsconditionvalue,jsfunction,jsfunctionvalue)
{
var elementtypeSubArray = [];
returnvalue = true;

if(jsconditionvalue == 'notempty'){

for (var i=0; i<elementtypeArray.length; i++){

elementtypeSubArray = elementtypeArray[i].split(':');

if (elementtypeSubArray[1] == 'text'){
if(document.getElementById(elementtypeSubArray[0]).value == ''){
returnvalue = JSMainFunctionErrorOutput(document.getElementById(elementtypeSubArray[0]).title,jsconditionvalue,jsfunction,jsfunctionvalue);
}
}

if (elementtypeSubArray[1] == 'password'){
if(document.getElementById(elementtypeSubArray[0]).value == ''){
returnvalue = JSMainFunctionErrorOutput(document.getElementById(elementtypeSubArray[0]).title,jsconditionvalue,jsfunction,jsfunctionvalue);
}
}

if (elementtypeSubArray[1] == 'textarea'){
if(document.getElementById(elementtypeSubArray[0]).value == ''){
returnvalue = JSMainFunctionErrorOutput(document.getElementById(elementtypeSubArray[0]).title,jsconditionvalue,jsfunction,jsfunctionvalue);
}
}

if (elementtypeSubArray[1] == "checkbox"){
for($i=0;$<document.getElementById(elementtypeSubArray[1]).length;$i++){
if(document.getElementById(elementtypeSubArray[1]).value != ''){
checkboxgroupchecked = true;
}else{
checkboxgroupchecked = false;
}
}

if(!(checkboxgroupchecked)){
returnvalue = JSMainFunctionErrorOutput(document.getElementById(elementtypeSubArray[0]).title,jsconditionvalue,jsfunction,jsfunctionvalue);
}
}

if (elementtypeSubArray[1] == 'select-one'){
if(document.getElementById(elementtypeSubArray[0]).selectedIndex == ''){
returnvalue = JSMainFunctionErrorOutput(document.getElementById(elementtypeSubArray[0]).title,jsconditionvalue,jsfunction,jsfunctionvalue);
}
}



}
}
return returnvalue;
}

function JSMainFunctionErrorOutput(element,jsconditionvalue,jsfunction,jsfunctionvalue){
var condition_text

if(jsconditionvalue == 'notempty'){
condition_text = 'should not be empty';
}

if(jsfunction == 'alert'){
if(jsfunctionvalue == 'default'){
alert(element+' '+condition_text);
return false;
}
if(jsfunctionvalue == 'multiple'){
alert(element+' '+condition_text);
return false;
}
}

}