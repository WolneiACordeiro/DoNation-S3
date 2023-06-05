import cv2
import numpy as np


def rotacionar (rotacao_image,angulo):
    altura, largura = rotacao_image.shape[0], rotacao_image.shape[1]
    y,x = altura /2, largura /2
    rotacao_matriz = cv2.getRotationMatrix2D((y,x), angulo, 1.0)
    #utilizacao seno e coseno
    coseno = np.abs(rotacao_matriz[0][0])
    seno = np.abs(rotacao_matriz[0][1])
    #calculo nova altura e largura
    nova_altura = int((altura * seno) + largura * coseno)
    nova_largura = int((largura * coseno) + largura * seno)
    #criacao da matriz
    rotacao_matriz[0][2] += (nova_largura/2) - x
    rotacao_matriz[1][2] += (nova_altura/2) - y
    #rotacionamento da imagem
    rotacionando_image = cv2.warpAffine (rotacao_image, rotacao_matriz, (nova_largura, nova_altura))
    return rotacionando_image
#escolha da imagem
imagem_download= cv2.imread("download.jpg", 1)

#definicao do angulo a ser utilizado
Rotacao_Detalhada = rotacionar (imagem_download,90)

#Abertura das 3 telas com a imagem
cv2.imshow("Imagem Normal", imagem_download)
cv2.imshow("Rotação Calculo Complexa", Rotacao_Detalhada)

#fechar a tela com a tecla esc
cv2.waitKey(0)
#fechar todas as telas
cv2.destroyAllWindows()
#Criar uma função em python para rotacionar uma imagem?
