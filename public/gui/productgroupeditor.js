/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('ProductGroupEditor', ['ngRoute', 'Common']).
    constant('ProductGroupEditorProperties', {
        name: 'ProductGroupEditor',
        basename: 'productgroupeditor',
        title: 'Product Group Editor',
        category: 'Products'
    }).
    config(['$routeProvider', 'ProductGroupEditorProperties', function ($routeProvider, ProductGroupEditorProperties) {
        $routeProvider.when('/'+ProductGroupEditorProperties.basename, {templateUrl: 'gui/'+ProductGroupEditorProperties.basename+'.html', caseInsensitiveMatch: true});
    }]).
    run(['CommonService', 'ProductGroupEditorProperties', function (CommonService, ProductGroupEditorProperties) {
        CommonService.registerModule(ProductGroupEditorProperties);
    }]).
    controller('ProductGroupEditorController', ['$window', '$http', 'ProductGroupEditorProperties', 'CommonService', function ($window, $http, ProductGroupEditorProperties, CommonService) {
        var self = this;
        CommonService.changeCurrentModule(ProductGroupEditorProperties);  
        self.columns = [];
        self.search = [];
        self.records = [];
        self.refineSearch = function(col,cell){                                                                      
            self.search.field = col;                                                                                 
            self.search.isStrict = "true";                                                                           
            self.search.value = cell;                                                                                
            self.getRecords();                                                                                       
        }; 
        self.getColumns = function(){
            $http.get('api/productcolumns.php').then(function(response){
                self.columns = response.data;                                                                        
            },function(response){});                                                                                 
        };                                                                                                           
        self.getRecords = function(){                                                                                
            if (self.search.field&&self.search.value) $http.get('api/productrecords.php',{params:{field:self.search.field,isStrict:self.search.isStrict,value:self.search.value}}).then(function(response){                                    
                self.records = response.data;                                                                        
            },function(response){});                                                                                 
        }; 
        self.batchEdit = function(col,cell){                                                                         
            if (col!='PR_ProductID') for (var i in self.records) {                                                                                    
                self.records[i][col] = cell;                                                                   
            };                                                                                                       
        };  
        self.getColumns();
        self.singleSave = function(field,id,value){
            var data = [];
            data[field+'__'+id] = value;
            $window.alert(data);
            $http.post('api/productupdate.php', data).then(function(response){
                $window.alert(response.data);
            },function(response){});
        };
    }]);





                                                                                                                                                                                                                
                                                                                                                
//                self.save = function(){                                                                                      
//                    var postParams = {};                                                                                   
//                    for (var i = 0; i<self.results.length; i++) {                                                          
//                        var k = self.results[i]["PR_ProductID"];                                                           
//                        for (var j in self.results[i]) {                                                                   
//                            if (self.results[i][j]!=self.originalResults[i][j]) postParams[k+"__"+j] = self.results[i][j]; 
//                       };                                                                                                  
//                   };                                                                                                      
//                    $http.post("php/group-update.php",{params:postParams}).then(function(response){                        
//                        window.alert("!");                                                                                 
//                    },function(response){})                                                                                
//                };                                                                                                                                                                                                     
            
            
            