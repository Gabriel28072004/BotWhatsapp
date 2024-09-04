import pyautogui
import time
import pymysql



# Configuração da conexão com o banco de dados
conexao = pymysql.connect(
    host='localhost',
    database='bot_zap',
    password='',
    user='root'
)

contatos = []
mensagens = []

with conexao:
     with conexao.cursor() as cursor:
        # Read a single record
        sql = "SELECT 'id_contato', `id_mensagem` FROM `envio` WHERE `id_contato`= %s,`id_mensagem`= %s"
        cursor.execute(sql, contatos, mensagens)
        result = cursor.fetchone()
        print(result)

while(len(contatos) > 0):
    pyautogui.press("win")
    time.sleep(3)
    pyautogui.write("opera")
    pyautogui.press("enter")
    time.sleep(3)

    pyautogui.write("https://web.whatsapp.com")
    pyautogui.press("enter")


    time.sleep(10)
    for ordem in range(len(contatos)):
        pyautogui.click(391, 209)
        time.sleep(3)

        pyautogui.write(contatos[ordem])
        pyautogui.press('enter')
        time.sleep(2)
        pyautogui.write(mensagens[ordem])
        pyautogui.press('enter')

        time.sleep(5)


pyautogui.hotkey('ctrl', 'w')
pyautogui.hotkey('ctrl', 'w')

print(contatos)
print(mensagens)
