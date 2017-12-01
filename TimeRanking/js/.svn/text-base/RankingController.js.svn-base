function RankingController($scope) {
    
    $scope.characters = false;
    
    $scope.clans = false;
    
    $scope.classes = false;
    
    $scope.rankings = false;
    
    $scope.message = false;
    
    $scope.initClasses = function() {
        jQuery.ajax({
            type : 'POST',
            dataType : 'json',
            url : 'funcoes/classes.php',
            data : 'idRaca=' + $('#raca-char').val(),
            async : false,
            success : function(classes) {
                $scope.classes = classes;
            }
        });
    }
    
    $scope.initRankings = function() {
        var tipo = $('#tipo-ranking').val();
        
        if (tipo == 1) {
            $scope.rankings = [{
                name : 'PvP', 
                val : 'pvp'
            }, {
                name : 'PK', 
                val : 'pk'
            }, {
                name : 'Level', 
                val : 'level'
            }, {
                name : 'Karma', 
                val : 'karma'
            }, {
                name : 'Tempo Online', 
                val : 'tempoOn'
            }, {
                name : 'Recomendações', 
                val : 'recomendacoes'
            }, {
                name : 'HP Máximo', 
                val : 'hp'
            }, {
                name : 'CP Máximo', 
                val : 'cp'
            }];
        } else {
            $scope.rankings = [{
                name : 'PvP', 
                val : 'pvp'
            }, {
                name : 'PK', 
                val : 'pk'
            }];
        }
    }
    
    $scope.getCharacters = function() {
        var tipo = $('#tipo-ranking').val();
        var ranking = $('#ranking-char').val();
        var raca = $('#raca-char').val() == undefined ? '' : $('#raca-char').val();
        var classe = $('#classe-char').val() == undefined ? '' : $('#classe-char').val();
        var lvlIni = $('#level-ini-char').val() == undefined ? '' : $('#level-ini-char').val();
        var lvlFin = $('#level-fin-char').val() == undefined ? '' : $('#level-fin-char').val();
        var limite = $('#limite-char').val();
        
        if (tipo == 0){
            $scope.message = {
                message : 'Especifique o tipo do ranking que você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#tipo-ranking').focus();
            return false;
        } else if (raca == 0) {
            $scope.message = {
                message : 'Especifique qual raça de char você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#raca-char').focus();
            return false;
        } else if (classe == 0) {
            $scope.message = {
                message : 'Especifique qual classe de char você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#classe-char').focus();
            return false;
        } else if (ranking == 0) {
            $scope.message = {
                message : 'Especifique qual ranking de char você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#ranking-char').focus();
            return false;
        } else if (limite == 0) {
            $scope.message = {
                message : 'Especifique qual o limite do ranking de char que você deseja visualizar!!', 
                type : 'alert-error'
            };
            $('#limite-char').focus();
            return false;
        } else {
            jQuery.ajax({
                type : 'POST',
                dataType : 'json',
                url : 'funcoes/ranking.php',
                data : 'requisicao=ajax&tipo=char&tipor=' + tipo + '&ranking=' + ranking + '&raca=' + raca + '&classe=' + classe + '&lvlIni=' + lvlIni +'&lvlFin=' + lvlFin + '&limite=' + limite,
                async : false,
                beforeSend : function() {
                    $scope.message = {
                        message : 'Carregando o ranking de characters.. Aguarde!!', 
                        type : 'alert-info'
                    };
                },
                success : function(characters) {
                    $scope.ranking = $('#ranking-char option[value="' + ranking + '"]').html();
                    $scope.characters = characters;
                    $scope.clans = false;
                    $scope.message = false;
                }
            });
        }
        
    }

    $scope.getClans = function() {
        var ranking = $('#ranking-clan').val();
        var limite = $('#limite-clan').val();
        
        if (ranking == 0) {
            $scope.message = {
                message : 'Especifique qual ranking do clan você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#ranking-clan').focus();
            return false;
        } else if (limite == 0){
            $scope.message = {
                message : 'Especifique qual o limite do ranking de clan que você deseja visualizar!', 
                type : 'alert-error'
            };
            $('#limite-clan').focus();
            return false;
        } else {
            jQuery.ajax({
                type : 'POST',
                dataType : 'json',
                url : 'funcoes/ranking.php',
                data : 'requisicao=ajax&tipo=clan&ranking=' + ranking + '&limite=' + limite,
                async : false,
                beforeSend : function() {
                    $scope.message = {
                        message : 'Carregando o ranking de clan.. Aguarde!!', 
                        type : 'alert-info'
                    };
                },
                success : function(clans) {
                    $scope.ranking = $('#ranking-clan option[value="' + ranking + '"]').html();
                    $scope.clans = clans;
                    $scope.characters = false;
                    $scope.message = false;
                }
            });
        }
    }
}

