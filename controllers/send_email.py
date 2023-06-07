from flask import Flask, request, jsonify
from flask_cors import CORS
import smtplib
from email.mime.text import MIMEText

app = Flask(__name__)
CORS(app)  # Habilita o CORS para todas as rotas

@app.route('/send_email', methods=['POST'])
def send_email():
    data = request.get_json()
    destinatario = data['destinatario']

    remetente = '1618mymail@zohomail.com'
    senha = '1618@@134652'

    assunto = 'Assunto do e-mail'
    corpo = 'Olá,\n\nEsta é uma mensagem automática enviada por Flask.'

    mensagem = MIMEText(corpo, 'plain', 'utf-8')
    mensagem['Subject'] = assunto
    mensagem['From'] = remetente
    mensagem['To'] = destinatario

    try:
        with smtplib.SMTP('smtp.zoho.com', 587) as smtp_obj:
            smtp_obj.starttls()
            smtp_obj.login(remetente, senha)
            smtp_obj.send_message(mensagem)
        
        return jsonify({'success': True, 'message': 'E-mail enviado com sucesso!'})
    except Exception as e:
        return jsonify({'success': False, 'message': 'Erro ao enviar o e-mail: {}'.format(str(e))})

if __name__ == '__main__':
    app.run()
