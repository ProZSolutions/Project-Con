"use strict";
var materialModule = angular.module('materialModule', []);

materialModule.controller('materialListController', ['$scope', '$location','$http', function($scope, $location, $http){
    function cbSuccessMaterialList(response) {
       .success(function(data) {
            $scope.getMaterial = data;
            console.log(data);
        });
            $location.reload();
        //$scope.addMaterial = response.data;
    }

    function cbFailureMaterialList(response) {
        $scope.getMaterial = {
            "status": "error",
            "data": "Error is response"
        }
    }

    materialService.getMaterial(name,type)
    .success(cbSuccessMaterialList, cbFailureMaterialList);


    function addMaterial() {
        function cbSucessAddMaterial(response) {
             $location.reload();
        }

        function cbfailureAddMaterial(response) {
        }

        materialService.addMaterial(name, type)
        .success(cbSucessAddMaterial, cbfailureAddMaterial);
    }

    function updateMaterial(name, type){
        function cbSuccessUpdateMaterial(response){
            $location.reload();  
        }

        function cbfailureUpdateMaterial(response){
           
            }
        materialService.updateMaterial(name,type)
        .success(cbSuccessUpdateMaterial,cbfailureUpdateMaterial);
        }
}]);



   
                
         
    

