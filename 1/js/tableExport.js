(function($){
        $.fn.extend({
            tableExport: function(options) {
                var defaults = {
      separator: ',',
      ignoreColumn: [],
      tableName:'table',
      type:'excel',
      pdfFontSize:14,
      pdfLeftMargin:20,
      escape:'true',
      htmlContent:'false',
      consoleLog:'true'
    };
                 
    var options = $.extend(defaults, options);
    var el = this;
     
    if(defaults.type == 'excel' ){
     var excel="<table>";
     // Header
     $(el).find('thead').find('tr').each(function() {
      excel += "<tr>";
      $(this).filter(':visible').find('th').each(function(index,data) {
       if ($(this).css('display') != 'none'){     
        if(defaults.ignoreColumn.indexOf(index) == -1){
         excel += "<td>" + parseString($(this))+ "</td>";
        }
       }
      }); 
      excel += '</tr>';      
       
     });     
      
      
     // Row Vs Column
     var rowCount=1;
     $(el).find('tbody').find('tr').each(function() {
      excel += "<tr>";
      var colCount=0;
      $(this).filter(':visible').find('td').each(function(index,data) {
       if ($(this).css('display') != 'none'){ 
        if(defaults.ignoreColumn.indexOf(index) == -1){
         excel += "<td>"+parseString($(this))+"</td>";
        }
       }
       colCount++;
      });               
      rowCount++;
      excel += '</tr>';
     });     
     excel += '</table>'
      
     if(defaults.consoleLog == 'true'){
      console.log(excel);
     }
      
     var excelFile = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns='http://www.w3.org/TR/REC-html40'>";
     excelFile += "<head>";
     excelFile += "<!--[if gte mso 9]>";
     excelFile += "<xml>";
     excelFile += "<x:ExcelWorkbook>";
     excelFile += "<x:ExcelWorksheets>";
     excelFile += "<x:ExcelWorksheet>";
     excelFile += "<x:Name>";
     excelFile += "Sheet1";
     excelFile += "</x:Name>";
     excelFile += "<x:WorksheetOptions>";
     excelFile += "<x:DisplayGridlines/>";
     excelFile += "</x:WorksheetOptions>";
     excelFile += "</x:ExcelWorksheet>";
     excelFile += "</x:ExcelWorksheets>";
     excelFile += "</x:ExcelWorkbook>";
     excelFile += "</xml>";
     excelFile += "<![endif]-->";
     excelFile += "</head>";
     excelFile += "<body>";
     excelFile += excel;
     excelFile += "</body>";
     excelFile += "</html>";
     var base64data = "base64," + $.base64({ data: excelFile, type: 0 });
     //window.open('data:application/vnd.ms-excel');
    // var base64data = "base64," + $.base64.encode(excelFile);
    window.open('data:application/vnd.ms-excel;filename=exportData.doc;' + base64data);
      
    }
    function parseString(data){
     
     if(defaults.htmlContent == 'true'){
      content_data = data.html().trim();
     }else{
      content_data = data.text().trim();
     }
      
     if(defaults.escape == 'true'){
      content_data = escape(content_data);
     }
     return content_data;
    }
    
   }
        });
    })(jQuery);