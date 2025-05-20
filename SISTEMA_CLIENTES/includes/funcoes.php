<?php
/**
 * Funções úteis para o sistema de cadastro de clientes
 */

/**
 * Formata um número de telefone
 * @param string $telefone Número de telefone a ser formatado
 * @return string Telefone formatado
 */
function formatarTelefone($telefone) {
    if (empty($telefone)) {
        return '';
    }

    // Remove tudo que não é dígito
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

    // Formatação para números com DDD
    if (strlen($telefone) == 11) {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
    } elseif (strlen($telefone) == 10) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
    }

    // Retorna sem formatação se não for possível formatar
    return $telefone;
}

/**
 * Formata uma data para o formato brasileiro (dd/mm/aaaa)
 * @param string $data Data no formato YYYY-MM-DD
 * @return string Data formatada ou string vazia se inválida
 */
function formatarDataBR($data) {
    if (empty($data) || $data == '0000-00-00') {
        return '';
    }

    return date('d/m/Y', strtotime($data));
}

/**
 * Converte uma data do formato brasileiro para o formato do banco (YYYY-MM-DD)
 * @param string $data Data no formato DD/MM/YYYY
 * @return string Data no formato YYYY-MM-DD ou NULL se inválida
 */
function formatarDataBanco($data) {
    if (empty($data)) {
        return null;
    }

    $partes = explode('/', $data);
    if (count($partes) == 3) {
        return $partes[2] . '-' . $partes[1] . '-' . $partes[0];
    }

    return null;
}

/**
 * Redireciona para uma URL com mensagem de status
 * @param string $url URL para redireciona