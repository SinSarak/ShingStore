//$(document).on("change", "#input", function () {
//    PreviewImage(this, $("#img"));
//});
function PreviewImage(file, image) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            image.attr('src', e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
    }
}

//$(document).on("change", "#input", function () {
//PreviewImageWithValidation(this, $("#imgSave-Company"), 1080, 1080, "/images/default.png",0);
//});
//if image is invalid demonsion, it will alert and clear input file. Style 0 for normal input file and 1 for filestyle input file to clear.
function PreviewImageWithValidation(file, image, width, height, defaultImg, style) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        //Temp Image for validation
        var Iimage = new Image();
        reader.onload = function (e) {
            Iimage.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);

        //Valid Temp Image demonsion
        $(Iimage).load(function () {
            var realWidth = this.width;
            var realHeight = this.height;
            if (parseFloat(realWidth) > width || parseFloat(realHeight) > height) {
                alert("Allow Maximum demonsion is " + width + " * " + height + "  (px). Please Choose other.");

                //Normal Input File
                if (style == "0") {
                    $(file).val("");
                }//FileStyle Input File
                else if (style == "1") {
                    $(file).filestyle('clear');
                }
            } else {
                //Valid Demonsion Preview Image (Allow to go)
                reader.onload = function (e) {
                    image.attr('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        });
    }
}

//$(document).on("change", "#file1", function () {
//    ValidationImageDemonsion(this, 1080, 1080, 1);
//});
function ValidationImageDemonsion(file, width, height, style) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        //Temp Image for validation
        var Iimage = new Image();
        reader.onload = function (e) {
            Iimage.src = e.target.result;
        }
        reader.readAsDataURL(file.files[0]);

        //Valid Temp Image demonsion
        $(Iimage).load(function () {
            var realWidth = this.width;
            var realHeight = this.height;
            if (parseFloat(realWidth) > width || parseFloat(realHeight) > height) {
                alert("Allow Maximum demonsion is " + width + " * " + height + "  (px). Please Choose other.");

                //Normal Input File
                if (style == "0") {
                    $(file).val("");
                }//FileStyle Input File
                else if (style == "1") {
                    $(file).filestyle('clear');
                }
            }
        });
    }
}

//$(document).on("change", "#file", function () {
//GetImageBase64(this, function (base64) {
//    $("#img").attr("src", base64);
//})
//});
GetImageBase64 = function (file, callback) {
    var selectedFile = file.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        callback(e.target.result, e.target.error);
    };
    reader.readAsDataURL(selectedFile);
};


//Preview Image in Object File in FormData
//for(var pair of formData.entries()) {
//    if (pair[0] == filename) {
//        PreviewImageObjectFile(pair[1], $("#imgProduct"));
//    }
//}
function PreviewImageObjectFile(file, image) {

    var reader = new FileReader();
    reader.onload = function (e) {
        image.attr('src', e.target.result);
    }
    reader.readAsDataURL(file);

}

function PreviewImageAndHref(file, image, a) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            image.attr('src', e.target.result);
            a.attr('href', e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
    }
}

//ValidImageType($("#file"));
function ValidImageType(file) {
    //Check Image Type
    var ext = file.val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) != -1) {
        return true;
    }
    return false;
}

//DisplayFileExtension($("#file"));
function DisplayFileExtension(file) {

    //Give Font Amesome for File extension
    var ext = file.split('.').pop().toLowerCase();
    if ($.inArray(ext, ['rar', 'zip', '7z', 'czip', 'pak']) != -1) {
        return "fa fa-file-archive-o fa-lg color_rar";
    }
    if ($.inArray(ext, ['pcm', 'wav', 'aiff', 'mp3', 'acc', 'flac', 'wma', 'alac']) != -1) {
        return "fa fa-file-audio-o fa-lg color_audio";
    }
    if ($.inArray(ext, ['xls', 'xlt', 'xlm', 'xlsz', 'xltx', 'xltm', 'xlsb', 'xla', 'xlam', 'xll', 'xlw', 'xlsx']) != -1) {
        return "fa fa-file-excel-o fa-lg color_excel";
    }
    if ($.inArray(ext, ['jpg', 'jpeg', 'jfif', 'jpeg 2000', 'exif', 'tiff', 'gif', 'bmp', 'png', 'ppm', 'pgm', 'pbm', 'pnm', 'webp', 'hdr', 'bat', 'bpg', 'svg', '3d', 'cgm']) != -1) {
        return "fa fa-file-image-o fa-lg color_image";
    }
    if ($.inArray(ext, ['webm', 'mkv', 'flv', 'mpeg', 'mpeg-4', 'vob', 'ogv', 'ogg', 'gifv', 'mng', 'avi', 'mov', 'wmv', 'yuv', 'rm', 'rmvb', 'asf', 'amv', 'mp4', 'mp4g', 'mpv', 'mpg', 'm2v', 'mpeg', 'm4v', 'svi', '3gp', 'mxf', 'roq', 'nsv', 'flv', 'f4v', 'f4p', 'f4a', 'f4b']) != -1) {
        return "fa fa-file-movie-o fa-lg color_video";
    }
    if ($.inArray(ext, ['pdf']) != -1) {
        return "fa fa-file-pdf-o fa-lg color_pdf";
    }
    if ($.inArray(ext, ['pptx', 'pptm', 'ppt', 'potx', 'pot', 'ppsx', 'ppsm', 'pps', 'ppam', 'ppa']) != -1) {
        return "fa fa-file-powerpoint-o fa-lg color_ppt";
    }
    if ($.inArray(ext, ['txt', 'html', 'htm']) != -1) {
        return "fa fa-file-text-o fa-lg color_text";
    }
    if ($.inArray(ext, ['doc', 'docx', 'odt']) != -1) {
        return "fa fa-file-word-o fa-lg color_word";
    }
    return "fa fa-file-o fa-lg color_none";
}

//Convert 8/11/2017 12:00:00 AM from Database to 2017-08-11
//DisplayDate(2017-08-11T00:00:00);
function DisplayDate(date) {
    //Process Date from SQL to HTML
    var result = "";
    if (date != null) {
        var jdate = date.slice(0, 10).split('-');
        //result = jdate[0] + '-' + jdate[1] + '-' + jdate[2];  //yyyy MM dd
        result = jdate[2] + '/' + jdate[1] + '/' + jdate[0];  //dd MM yyyy
    }
    else
        result = "";

    if (result == "0001-01-01") {
        result = "mm-dd-yyyy";
    }

    return result;
}


//function ConvertNullDate("mm-dd-yyyy");
function ConvertNullDate(datestring) {
    if (datestring == "mm-dd-yyyy" || datestring == "yyyy-mm-dd" || datestring == "mm/dd/yyyy" || datestring == "yyyy/mm/dd") {
        return "";
    }
    else {
        return datestring;
    }
}

//c_index starts from 0 , where column  value is search will be searched.
//DeleteRowbyColumnValue($("#tableid tr"),1,"sarak");
function DeleteRowbyColumnValue(table, c_index, value) {
    //table must with tr   . like $("#tableid tr")
    var found = 0;
    table.each(function () {
        var c_value = $(this).find('td:eq(' + c_index + ')').text();
        if (c_value == value) {
            $(this).remove();
            found = 1;
            return false;
        }
    });
    if (found == 0) {
        alert("No Found : " + value);
    }
}

//Get Row Index in table
//GetRowNumber($("#btnedit"));
function GetRowNumber(editBtn) {
    var num = $(editBtn).closest('tr').index();
    return num;
}
//EditColTable($("#tbbody"), 1, 3, "<button class='btn btn-default')> Haha</button>");
function EditColTable(tbody, rownumber, colnumber, value) {
    var CCol = $(tbody).find('tr:nth-child(' + rownumber + ') td:nth-child(' + colnumber + ')').html(value);
}

function Star() {
    $(".star").append("<i style=color:red>*</i>");
}
//SetDisactiveBackground(1);
function SetDisactiveBackground(isactive) {
    if (isactive == 0) {
        return activecolor = '#ff8080';
    }
    else {
        return activecolor = '';
    }
}

//isCheckBox($("#chktype"));
function isCheckBox(chk) {
    if ($(chk).is(":checked")) {
        return 1;
    }
    else {
        return 0;
    }
}
//DeactiveisCheckBox($("#chktype"));
function DeactiveisCheckBox(chk) {
    if ($(chk).is(":checked")) {
        return 0;
    }
    else {
        return 1;
    }
}
//var arrdata = JsonArraySpliter("[json]");
//arrdata[i].id;
//response get from return JSON
function JsonArraySpliter(response) {
    var data = eval("(" + response + ")");
    var arrdata = new Array();
    arrdata = data;
    return arrdata;
}

//GetRadioButton($("[name=rdotype]"));
//Need attribute Value
function GetRadioButton(rdo) {
    var v = "";
    $(rdo).each(function (index) {
        if (($(this).prop('tagName') == "INPUT") && $(this).attr("value") && ($(this).attr("type") == "radio")) {
            if ($(this).is(":checked")) {
                v = $(this).val();
                return;
            }
        }
    });
    return v;
}

//SetRadioButton($("[name=rdotype]"),"c");
//Need attribute Value
function SetRadioButton(rdo, val) {
    $(rdo).each(function (index) {
        if (($(this).prop('tagName') == "INPUT") && $(this).attr("value") && ($(this).attr("type") == "radio")) {
            if ($(this).val() == val) {
                $(this).iCheck('check');
            }
        }
    });
}

//isEmail("asdf@gmail.com");
function isEmail(email) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(email);
}

//isPhonenumber("(123)123-123_");
//isPhonenumber("(123)123-1234");
//isPhonenumber("123-123-123_");
//isPhonenumber("123-123-1234");
function isPhonenumber(textval) {
    var urlregex = new RegExp(
          /^(?:\(\d{3}\)|\d{3}-)\d{3}-(?:\d{3}_|\d{4})$/);
    return urlregex.test(textval);
}


//isWebsite("www.google.com");
function isWebsite(textval) {
    var urlregex = new RegExp(
          "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
    return urlregex.test(textval);
}

//Remove string from text
function ReString(value, from, to) {
    var ret = value.replace(from, to);
    return ret;
}

//Base64.encode(string);
//Base64.decode(encodedString);
var Base64 = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    encode: function (e) { var t = ""; var n, r, i, s, o, u, a; var f = 0; e = Base64._utf8_encode(e); while (f < e.length) { n = e.charCodeAt(f++); r = e.charCodeAt(f++); i = e.charCodeAt(f++); s = n >> 2; o = (n & 3) << 4 | r >> 4; u = (r & 15) << 2 | i >> 6; a = i & 63; if (isNaN(r)) { u = a = 64 } else if (isNaN(i)) { a = 64 } t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a) } return t },
    decode: function (e) { var t = ""; var n, r, i; var s, o, u, a; var f = 0; e = e.replace(/[^A-Za-z0-9+/=]/g, ""); while (f < e.length) { s = this._keyStr.indexOf(e.charAt(f++)); o = this._keyStr.indexOf(e.charAt(f++)); u = this._keyStr.indexOf(e.charAt(f++)); a = this._keyStr.indexOf(e.charAt(f++)); n = s << 2 | o >> 4; r = (o & 15) << 4 | u >> 2; i = (u & 3) << 6 | a; t = t + String.fromCharCode(n); if (u != 64) { t = t + String.fromCharCode(r) } if (a != 64) { t = t + String.fromCharCode(i) } } t = Base64._utf8_decode(t); return t },
    _utf8_encode: function (e) { e = e.replace(/rn/g, "n"); var t = ""; for (var n = 0; n < e.length; n++) { var r = e.charCodeAt(n); if (r < 128) { t += String.fromCharCode(r) } else if (r > 127 && r < 2048) { t += String.fromCharCode(r >> 6 | 192); t += String.fromCharCode(r & 63 | 128) } else { t += String.fromCharCode(r >> 12 | 224); t += String.fromCharCode(r >> 6 & 63 | 128); t += String.fromCharCode(r & 63 | 128) } } return t },
    _utf8_decode: function (e) { var t = ""; var n = 0; var r = c1 = c2 = 0; while (n < e.length) { r = e.charCodeAt(n); if (r < 128) { t += String.fromCharCode(r); n++ } else if (r > 191 && r < 224) { c2 = e.charCodeAt(n + 1); t += String.fromCharCode((r & 31) << 6 | c2 & 63); n += 2 } else { c2 = e.charCodeAt(n + 1); c3 = e.charCodeAt(n + 2); t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63); n += 3 } } return t }
}
//For iCheck
//CheckBoxiCheckGroup("typeaccess");
function CheckBoxiCheckGroup(name) {
    var chks = $("[name=" + name + "]");
    if (chks.prop('tagName') == "INPUT" && chks.attr("type") == "checkbox") {
        chks.on('ifClicked', function (event) {
            chks.iCheck('uncheck');
            $(this).iCheck('check');
        });
    }
    else {
        alert("Wrong Tag or Type in Attritude Name = " + name);
    }
}
//CheckBoxGroup("typeaccess");
function CheckBoxGroup(name) {
    var chks = $("[name=" + name + "]");
    if (chks.prop('tagName') == "INPUT" && chks.attr("type") == "checkbox") {
        chks.change(function () {
            chks.prop('checked', false);
            $(this).prop('checked', true);
        });
    }
    else {
        alert("Wrong Tag or Type in Attritude Name = " + name);
    }
}

//isNumber(123);isNumber("123");
//Check is Number
function isNumber(num) {
    return $.isNumeric(num);
}

//appendFiletoFormdata2(formdata,$("#inputfile"));
function appendFiletoFormdata2(formdata, file) {
    var files = file.get(0).files;
    for (var i = 0; i < files.length; i++) {
        formdata.append(files[i].name, files[i]);
    }
}

//appendFiletoFormdata3(formData, "key1", $("#file"));
function appendFiletoFormdata3(formdata, key, file) {
    var files = file.get(0).files;
    for (var i = 0; i < files.length; i++) {
        formdata.append(key, files[i], files[i].name);
    }
}

function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    var byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ia], { type: mimeString });
}

//$(document).on("change", "#file", function () {
//    GetImageBase64(this, function (base64) {
//        var blob = dataURItoBlob(base64);
//        var canvas = document.createElement('canvas');
//        var dataURL = canvas.toDataURL('image/jpeg', 0.5);
//        appendFiletoFormdata3Blob(formData, "key2", blob, "fileName11.png");
//        $("#img").attr("src", base64);
//    })
//});
function appendFiletoFormdata3Blob(formdata, key, data, filename) {
    formData.append(key, data, filename);
}

//appendImageBase64toFormdata3(formData,"base64....");
function appendImageBase64toFormdata3(formData, base64) {
    var blob = dataURItoBlob(base64); //  Function in the last step 
    var canvas = document.createElement('canvas');
    var dataURL = canvas.toDataURL('image/jpeg', 0.5);

    formData.append("the_file", blob, "image.png");
}

//getFileSize($("#file"));
function getFileSize(file) {
    var selectedFile = (file)[0].files[0];
    var FileSize = 0;
    if (selectedFile.size > 1048576) {
        FileSize = Math.round(selectedFile.size * 100 / 1048576) / 100 + " MB";
    }
    else if (selectedFile.size > 1024) {
        FileSize = Math.round(selectedFile.size * 100 / 1024) / 100 + " KB";
    }
    else {
        FileSize = selectedFile.size + " Bytes";
    }
    return FileSize;
}

//getFileName($("#file"));
function getFileName(file) {
    return file.val().split('\\').pop();
}
//deleteOption($("select option"),"item");
function deleteOption(option, value) {
    $(option).each(function (index) {
        if ($(this).attr("value")) {
            if ($(this).val() == value) {
                $(this).remove();
                return;
            }
        }
        else {
            alert("This option doesnt have value attritube.");
        }
    });
}
//var a1=[];
//a1.push($("#con1"),$("#con2"));
//CheckNullValues(a1,"no",1);
//var a2=[];
//a2.push("asdf","gssdsdf");
//CheckNullValues(a2,"no",0);
//cbonull: value to check null cbo box
//option: 1 is for control only, 0 is for value only
function CheckNullValues(arraydata, cbonull, option) {
    var result = false;
    //Value
    if (option == 0) {
        for (var i = 0; i < arraydata.length; i++) {
            if (arraydata[i] == "" || arraydata[i] == cbonull) {
                result = true;
            }
        }
        //Control
    } else {
        $(arraydata).each(function (index) {
            if ($(this).prop('tagName') == "SELECT") {
                if ($(this).val() == cbonull) {
                    result = true;
                }
            }
            else {
                if ($(this).val() == "") {
                    result = true;
                }
            }
        });
    }

    return result;
}
//AlertMessage("success", "Haha", "Oh Yeah!");
function AlertMessage(type, title, message) {
    var result = "";
    if (type == "warning") {
        result = "<div class='alert alert-warning alert-dismissable fade in' onclick='$(this).remove();'>" +
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
        "<strong>" + title + "</strong> " + message + "</div>";
    }
    else if (type == "success") {
        result = "<div class='alert alert-success alert-dismissable fade in' onclick='$(this).remove();'>" +
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
        "<strong>" + title + "</strong> " + message + "</div>";
    }
    else if (type == "danger") {
        result = "<div class='alert alert-danger alert-dismissable fade in' onclick='$(this).remove();'>" +
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
        "<strong>" + title + "</strong> " + message + "</div>";
    }
    else {
        result = "<div class='alert alert-info alert-dismissable fade in' onclick='$(this).remove();'>" +
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
        "<strong>" + title + "</strong> " + message + "</div>";
    }
    $(".div_alert_message").append(result);
}

//ClearAlertMessage(120);
//ClearAlertMessage("slow");
function ClearAlertMessage(speed) {
    if (speed == 0) {
        $(".div_alert_message div").remove();
        return;
    }

    switch (speed) {
        case "slow":
            speed = 120;
            break;
        case "normal":
            speed = 90;
            break;
        case "fast":
            speed = 75;
            break;
    }
    setInterval(function () {
        var divs = $(".div_alert_message div:first");
        divs.hide(speed, function () { $(this).remove(); });
    }, speed);
}

//Check is there alerting message
function isAlerting() {
    var divs = $(".div_alert_message");
    if (divs.has("div").length > 0) {
        return true;
    }
    return false;
}
//AjaxAlertMessage("Jsonstring");
function AjaxAlertMessage(messages) {
    var arrdata = JsonArraySpliter(messages);
    ClearAlertMessage(0);
    for (var i = 0; i < arrdata.length; i++) {
        AlertMessage(arrdata[i].type, arrdata[i].title, arrdata[i].message);
    }
}

//GetWidthheightImage($("#file"));
//Use return value:  .split('~').length;
function GetWidthheightImage(file) {
    //Get reference of FileUpload.
    var fileUpload = file[0];
    var result = [];
    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {
                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    result.push(width);
                    result.push(height);
                    console.log("1   " + result);
                    return result;
                };
            }
        } else {
            result.push("This browser does not support HTML5.");
            return false;
        }
    } else {
        result.push("Please select a valid Image file.");
        return false;
    }
}

//isUrl("/Home/Index");
function isUrl(url) {
    if (url.split("/").length == 3) {
        return true;
    } else {
        return false;
    }
}

//For Photo Table
//radioCheckedValueTr($("[name=rdotype]"),2);
//Column start from 1
function radioCheckedValueTr(rdo, column) {
    var v = "";
    $(rdo).each(function (index) {
        if (($(this).prop('tagName') == "INPUT") && ($(this).attr("type") == "radio")) {
            if ($(this).is(":checked")) {
                var trparent = $(this).closest('tr');
                var fileName = trparent.find("td:nth-child(" + column + ")").html();
                v = fileName;
                return;
            }
        }
    });
    return v;
}
//var arr = []; arr.push("A","B");
//J_implode("/", arr);
function J_implode(sign, arr) {
    var result = "";
    if (arr.length > 1) {
        for (var i = 0; i < arr.length - 1; i++) {
            result += arr[i] + sign;
        }
        return result + arr[arr.length - 1];
    }
    else if (arr.length == 1) {
        return arr[0];
    }
    else {
        return "";
    }
}

//NewLineTextarea(textfromtextarea);
function NewLineTextarea(text) {
    var result = text.replace(/\n/g, "<br />");
    return result;
}

function generateSerial(zone) {
    var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        result = "";
    for (var z = 0; z < zone; z++) {
        for (var i = 4; i > 0; --i)
            result += chars[Math.round(Math.random() * (chars.length - 1))];
        if (z < zone-1) {
            result += "-";
        }
    }
    return result;
}

function getCurrentDate() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = (month < 10 ? '0' : '') + month + '/' +
        (day < 10 ? '0' : '') + day + '/' + d.getFullYear();
    return output;
}

function getYoutubeEmbed(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return "https://www.youtube.com/embed/"+match[2];
    } else {
        return url;
    }
}





