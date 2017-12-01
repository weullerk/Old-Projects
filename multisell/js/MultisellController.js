function MultisellController($scope) { 
    $scope.itens = [
    {
        id: 1,
        name: '',
        ingredients: [], 
        productions: []
    }
    ];
        
    $scope.alerts = {
        item: false, 
        ingredient: false, 
        production: false
    };
    
    $scope.log = [];
    
    $scope.addIngredient = function(){
        if (
            $scope.validateNumber($('#ingredient-id').val()) 
            && $scope.validateNumber($('#ingredient-count').val()) 
            && $scope.validateNumber($('#ingredient-enchant').val())
            ){
            lastItem = $scope.itens.length - 1;
            $scope.itens[lastItem].ingredients.push({
                id: $scope.ingredientId, 
                count: $scope.ingredientCount, 
                enchant: $scope.ingredientEnchant
            });
            $scope.ingredientId = '';
            $scope.ingredientCount = '';
            $scope.ingredientEnchant = '';
            $scope.alerts.ingredient = false;
            $scope.log.push('ingredient');
        } else {
            $scope.alerts.ingredient =  'Some field is empty or invalid!';
        }
    }
    
    $scope.addProduction = function(){
        if (
            $scope.validateNumber($('#production-id').val()) 
            && $scope.validateNumber($('#production-count').val()) 
            && $scope.validateNumber($('#production-enchant').val())
            ){
            lastItem = $scope.itens.length - 1;
            $scope.itens[lastItem].productions.push({
                id: $scope.productionId, 
                count: $scope.productionCount, 
                enchant: $scope.productionEnchant
            });
            $scope.productionId = '';
            $scope.productionCount = '';
            $scope.productionEnchant = '';
            $scope.alerts.production =  false;
            $scope.log.push('production');
        }else {
            $scope.alerts.production =  'Some field is empty or invalid!';
        }
    }
    
    $scope.newItem = function(){
        if ($('#item-name').val() != '') {
            lastItem = $scope.itens.length - 1;
            lastId = $scope.itens[lastItem].id + 1;
            $scope.itens[lastItem].name = $scope.itemName;
            $scope.itemName = '';
            $scope.itens.push({
                id: lastId, 
                name: '', 
                ingredients: [], 
                productions: []
            });
            $scope.log.push('item');
        } else {
            $scope.alerts.item =  'Field is empty!';
        }
    }
    
    $scope.finalize = function(){
        if ($('#item-name').val() != '') {
            lastItem = $scope.itens.length - 1;
            if ($scope.itens[lastItem].ingredients.length > 0 || $scope.itens[lastItem].productions.length > 0) {
                lastId = $scope.itens[lastItem].id + 1;
                $scope.itens[lastItem].name = $scope.itemName;
                $scope.itemName = '';
                $scope.disableButtons();
                $scope.selectText($('#multisell-final')[0]);
                $scope.alerts.item =  false;
            } else {
                $scope.alerts.item =  'No item added!';
            }
        } else {
            $scope.alerts.item =  'Field is empty!';
        }
    }
    
    $scope.reset = function() {
        $scope.itens = [
        {
            id: 1,
            name: '',
            ingredients: [], 
            productions: []
        }
        ];
        $scope.enableButtons();
    }
    
    $scope.back = function() {
        if ($scope.log.length > 0) {
            lastLog = $scope.log.length - 1;
            lastAction = $scope.log[lastLog];          
            lastItem = $scope.itens.length - 1;
            if (lastAction == 'item') {               
                removeItem = $scope.itens.indexOf(lastItem);
                $scope.itens.splice(removeItem, 1);
                $scope.itemName = $scope.itens[lastItem - 1].name;
                $scope.itens[lastItem - 1].name = '';
            } else if (lastAction == 'ingredient') {
                lastIngredient = $scope.itens[lastItem].ingredients.length-1;
                removeIngredient = $scope.itens[lastItem].ingredients.indexOf(lastIngredient);
                $scope.itens[lastItem].ingredients.splice(removeIngredient, 1);                
            } else if (lastAction == 'production') {
                lastProduction = $scope.itens[lastItem].ingredients.length-1;
                removeProduction = $scope.itens[lastItem].ingredients.indexOf(lastProduction);
                $scope.itens[lastItem].productions.splice(removeProduction, 1);             
            }
            removeLog = $scope.log.indexOf(lastLog);
            $scope.log.splice(removeLog, 1);
        }
    }
    
    $scope.enableButtons = function(){
        $('#item-new').removeAttr('disabled');
        $('#item-finalize').removeAttr('disabled');
        $('#ingredient-add').removeAttr('disabled');
        $('#production-add').removeAttr('disabled');
        $('#multisell-back').removeAttr('disabled');
    }
    
    $scope.disableButtons = function(){
        $('#item-new').attr('disabled', true);
        $('#item-finalize').attr('disabled', true);
        $('#ingredient-add').attr('disabled', true);
        $('#production-add').attr('disabled', true);
        $('#multisell-back').attr('disabled', true);
    }
    
    $scope.selectText = function selectText(text) { 
        if ($.browser.msie) {
            var range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if ($.browser.mozilla || j$.browser.opera) {
            var selection = window.getSelection();
            var range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        } else if ($.browser.safari) {
            var selection = window.getSelection();
            selection.setBaseAndExtent(text, 0, text, 1);
        }
    }
    
    $scope.validateNumber = function(number) {
        if (number.match(/^([0-9])+$/)) {
            return true;
        } else {
            return false;
        }
    }
    
}
