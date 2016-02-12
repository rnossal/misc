#!/usr/bin/env python
# encoding: utf-8

# Author: Rafael Nossal

import os, sys
# Tenta abrir o arquivo caixa.txt
try:
	with open(os.path.dirname(os.path.abspath(__file__)) + '/arquivo_caixa/caixa.txt') as arq:
		arqLido = arq.read()
except:
	print u'Você deve ter esquecido de colocar o arquivo gerado pela caixa registradora como "caixa.txt" dentro de "arquivo_caixa". Verifique o arquivo para depois executar o programa.\nPressione enter para sair...'
	raw_input()
	sys.exit()

# Transforma o que foi lido uma lista de produtos, transforma cada produto em outra com as três informações de um produto (caso já exista um produto com o mesmo nome só soma os valores) e soma a um total
try:
	prods = arqLido.splitlines()
	listaItens = []
	total = 0
	for prod in prods:
		prod = prod.split(';')
		existe = [n for n in listaItens if n[0].lower() == prod[0].lower()]

		if len(existe) is 0:
			listaItens.append([prod[0].lower(), int(prod[2]), float(prod[1]) * int(prod[2])])
		else:
			existe[0][1] += int(prod[2])
			existe[0][2] += float(prod[1]) * int(prod[2])

		total += float(prod[1]) * float(prod[2])
except:
	print u'O arquivo parece estar corrompido ou simplesmente com informações inválidas. Verifique ele primeiro.\nPressione enter para sair...'
	raw_input()
	sys.exit()

# Monta a string com as informações do relatório de totais que serão impressas
saida = ''
for ite in listaItens:
	saida += '%s - %i un. - R$%.2f\n' % (ite[0].capitalize(), ite[1], ite[2])

saida += '\nTOTAL - R$%.2f' % total

# Gera um arquivo com o relatório de totais calculados
file = open(os.path.dirname(os.path.abspath(__file__)) + '/saida/saida.txt', "w")
file.write(saida)
file.close()

# Mostra o relatório de totais na tela
print 'Totais dos itens:\n'
print saida
print u'\nArquivo com os totais também gerado na pasta "saida".\nPressione enter para sair...'
raw_input()
