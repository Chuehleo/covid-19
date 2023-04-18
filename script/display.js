var place_data=[
  {
   tag: "taipei_city",
   place: "臺北市",
   confirmed: "4,154",
   new: "+41",
  },

  {
   tag: "new_taipei_city",
   place: "新北市",
   confirmed: "6,000",
   new: "+76",
  },

  {
   tag: "taichung_city",
   place: "臺中市",
   confirmed: "181",
   new: "+2",
  },

  {
   tag: "tainan_city",
   place: "臺南市",
   confirmed: "41",
   new: "+0",
  },

  {
   tag: "kaohsiung_city",
   place: "高雄市",
   confirmed: "63",
   new: "+0",
  },

  {
   tag: "keelung_city",
   place: "基隆市",
   confirmed: "275",
   new: "+4",
  },

  {
   tag: "taoyuan",
   place: "桃園市",
   confirmed: "607",
   new: "+6",
  },

  {
   tag: "hsinchu_city",
   place: "新竹市",
   confirmed: "32",
   new: "+0",
  },

  {
   tag: "hsinchu",
   place: "新竹縣",
   confirmed: "71",
   new: "+1",
  },

  {
   tag: "miaoli",
   place: "苗栗縣",
   confirmed: "524",
   new: "+26",
  },

  {
   tag: "changhua",
   place: "彰化縣",
   confirmed: "250",
   new: "+0",
  },

  {
   tag: "nantou",
   place: "南投縣",
   confirmed: "30",
   new: "+0",
  },

  {
   tag: "yunlin",
   place: "雲林縣",
   confirmed: "20",
   new: "+0",
  },

  {
   tag: "chiayi_city",
   place: "嘉義市",
   confirmed: "9",
   new: "+2",
  },

  {
   tag: "chiayi",
   place: "嘉義縣",
   confirmed: "18",
   new: "+0",
  },

  {
   tag: "pingtung",
   place: "屏東縣",
   confirmed: "33",
   new: "+0",
  },

  {
   tag: "yilan",
   place: "宜蘭縣",
   confirmed: "93",
   new: "+0",
  },

  {
   tag: "hualien",
   place: "花蓮縣",
   confirmed: "68",
   new: "+1",
  },

  {
   tag: "taitung",
   place: "台東縣",
   confirmed: "22",
   new: "+0",
  },

  {
   tag: "penghu",
   place: "澎湖縣",
   confirmed: "5",
   new: "+0",
  },

  {
   tag: "kinmen",
   place: "金門縣",
   confirmed: "0",
   new: "+0",
  },

  {
   tag: "lienchiang",
   place: "連江縣",
   confirmed: "4",
   new: "+0",
  },
]
;
window.addEventListener('load', function () {
    var vm = new Vue({
        el: "#app",
        data: {
          filter: "",
          place_data: place_data
        },computed:{
          now_area: function(){
            var vobj=this;
            var result=this.place_data.filter(function(obj){
              return obj.tag==vobj.filter;
            });
            if (result.length==0){
              return null;
            }
            return result[0];
          }
        }
      });
      [].forEach.call(document.querySelectorAll('path'), function() {
      $("path").mousedown(function(e){
        var tagname=$(this).attr("name");
        vm.filter=tagname;
        var sel = this, pos = sel.getBoundingClientRect()
        $('#app').css({
          'display' : 'block',
          'top' : pos.top+1765 +'px',
          'left' : pos.left-78 + 'px'
      }); 
      });
});
})

