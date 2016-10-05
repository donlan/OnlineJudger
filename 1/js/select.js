(function($){
	var ID;
	$.Select={
		init:function(id,data){
			ID = id;
			for(var i =0,s= data.length;i<s;i++){
				$("#"+id).append('<option value="'+data[i].val+'">'+data[i].name+'</option>');
			}
			return this;
		},
		getSelect:function(){
			return $("#"+ID).val();
		},
		show:function(){
			$("#"+id).show();
		},
		hide:function(){
			$("#"+id).hide();
		},
		getLevel:function(sexId,p){
			return $("input[name='"+sexId+"']:checked").val()==p ? 'M'+$("#"+ID).val():'F'+$("#"+ID).val();
		},
		isLevelSuit:function(year){
			var y = $("#"+ID).val();
			var curYear = new Date().getYear() + 1900;
			switch (y){
				case '1':
				var g = curYear - year;
				if(curYear - year==6)
					return g;
					return false;
					break;
				case '2':
				var g = curYear - year;
				if(g==7 || g==8)
					return g;
					return false;
					break;
				case '3':
				var g = curYear - year;
				if(g==9 || g==10)
					return g;
					return false;
				break;
				case '4':
				var g = curYear - year;
				if(g==11 || g==12)
					return g;
					return false;
					break;
				case '5':
				var g = curYear - year;
				if(g>=13 || g<=15)
					return g;
					return false;
					break;
				case '6':
				var g = curYear - year;
				if(g>=16 || g<=18)
					return g;
					return false;
					break;
				case '7':
				var g = curYear - year;
				if(g>=19 || g<=25)
					return g;
					return false;
					break;
				case '8':
				var g = curYear - year;
				if(g>=26 || g<=40)
					return g;
					return false;
					break;
				case '9':
				var g = curYear - year;
				if(g>=41 || g<=45)
					return g;
					return false;
					break;
				case '10':
				var g = curYear - year;
				if(g>=46 || g<=50)
					return g;
					return false;
					break;
				case '11':
				var g = curYear - year;
				if(g>=51 || g<=55)
					return g;
					return false;
					break;
				case '12':
				var g = curYear - year;
				if(g>=56 || g<=60)
					return g;
					return false;
					break;
				case '13':
				var g = curYear - year;
				if(g>=61 || g<=65)
					return g;
					return false;
					break;
				case '14':
				var g = curYear - year;
				if(g>=66 || g<=70)
					return g;
					return false;
					break;
				case '15':
				var g = curYear - year;
				if(g>70)
					return g;
					return false;
					break;
				default:
				return false;
			}
		}
	}
	
})(jQuery);
var mData =[{val:'1',name:'6周岁'},{val:'2',name:'7-8周岁'},{val:'3',name:'9-10周岁'},
{val:'4',name:'11-12周岁'},{val:'5',name:'13-15周岁'},{val:'6',name:'16-18周岁'},{val:'7',name:'19-25周岁'}
,{val:'8',name:'26-40周岁'},{val:'9',name:'41-45周岁'},{val:'10',name:'46-50周岁'},{val:'11',name:'51-55周岁'}
,{val:'12',name:'56-60周岁'},{val:'13',name:'61-65周岁'},{val:'14',name:'66-70周岁'},{val:'15',name:'大于70周岁'}];
