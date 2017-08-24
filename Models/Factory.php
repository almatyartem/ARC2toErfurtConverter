<?php
class A2E_Models_Factory
{
    public $config = array(
        'ef_bind' => 'A2E_Models_Bind',
        'ef_concat' => 'A2E_Models_Concat',
        'ef_minus' => 'A2E_Models_Minus',
        'ef_var' => 'Erfurt_Sparql_Query2_Var',
        'ef_and' => 'Erfurt_Sparql_Query2_ConditionalAndExpression',
        'ef_or' => 'Erfurt_Sparql_Query2_ConditionalOrExpression',
        'ef_sameterm' => 'Erfurt_Sparql_Query2_sameTerm',
        'ef_additive' => 'Erfurt_Sparql_Query2_AdditiveExpression',
        'ef_multiplicative' => 'Erfurt_Sparql_Query2_MultiplicativeExpression',
        'ef_triple' => 'Erfurt_Sparql_Query2_TriplesSameSubject',
        'ef_propertylist' => 'Erfurt_Sparql_Query2_PropertyList',
        'ef_objectlist' => 'Erfurt_Sparql_Query2_ObjectList',
        'ef_literal' => 'Erfurt_Sparql_Query2_RDFLiteral',
        'ef_iri' => 'Erfurt_Sparql_Query2_IriRef',
        'ef_bracketted' => 'Erfurt_Sparql_Query2_BrackettedExpression',
        'ef_filter' => 'Erfurt_Sparql_Query2_Filter',
        'ef_groupgraph' => 'Erfurt_Sparql_Query2_GroupGraphPattern',
        'ef_optional' => 'Erfurt_Sparql_Query2_OptionalGraphPattern',
        'ef_prefix' => 'Erfurt_Sparql_Query2_Prefix',
        'ef' => 'Erfurt_Sparql_Query2'
    );

    function __construct($config = array())
    {
        $this->setConfig($config);
    }

    function __call($name, array $arguments){
        return $this->create($name,$arguments);
    }

    function setConfig($config)
    {
        foreach ($config as $model => $class) {
            if (isset($config[$model]))
                $config[$model] = $class;
        }
    }

    function create($model,$args)
    {
        if (isset($this->config[$model])) {
            $class = $this->config[$model];
            return new $class(...$args);
        }
        throw new Exception('Model does not exist');
    }

    /*function ef_var($pattern){
        $class = $this->config[__FUNCTION__];
        return new $class($pattern);
    }*/
}