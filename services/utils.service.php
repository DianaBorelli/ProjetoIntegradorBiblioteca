<?php
function getOption($estaEditando, $faixaAtual, $faixaSelecionada) {
    $option = "<option ";

    if($estaEditando && $faixaSelecionada == $faixaAtual) {
        $option .= 'selected ';
    }
    $option .= 'value="' . $faixaAtual . '">' . $faixaAtual . '</option>';
    echo $option;
}
?>