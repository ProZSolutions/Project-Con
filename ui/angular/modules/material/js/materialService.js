"use strict";
var materialModule = angular.module('materialModule', []);

materialModule.service('materialService', ['httpApi', 'con', function(httpApi, con) {
    this.getMaterial =  function() {
        var url = con.serviceUrl + "materials";
        return httpApi.get(url);
    };

    this.addMaterial =  function(name, type) {
        var url = con.serviceUrl + "addMaterial";
        data = {
            name: name,
            type: type
        }
        return httpApi.post(url, data);
    };
}]);

