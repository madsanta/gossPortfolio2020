// Copyright (c) Microsoft Corporation. All rights reserved.
// Licensed under the MIT License.

const { ActivityHandler } = require('botbuilder');

class EchoBot extends ActivityHandler {
    constructor() {
        super();
        // See https://aka.ms/about-bot-activity-message to learn more about the message and other activity types.
        this.onMessage(async (context, next) => {
            let result = `Вы сказали: '${ context.activity.text }!'`;
            if (context.activity.text.startsWith('Привет')){
                result = 'Приветик)';
            } else if (context.activity.text.startsWith('Как дела?')) {
                result = 'Всё норм, как твои?';
            } else if (context.activity.text.startsWith('Тоже хорошо')) {
                result = 'Рад за вас!';
            } else if (context.activity.text.startsWith('Что нового?')) {
                result = 'Новый машину купил, теперь коплю на дом';
            } else if (context.activity.text.startsWith('Погода на завтра в Питере')) {
                result = 'Облачно, вероятно будет дождь)';
            }
            await context.sendActivity(result);

            // By calling next() you ensure that the next BotHandler is run.
            await next();
        });

        this.onMembersAdded(async (context, next) => {
            const membersAdded = context.activity.membersAdded;
            for (let cnt = 0; cnt < membersAdded.length; ++cnt) {
                if (membersAdded[cnt].id !== context.activity.recipient.id) {
                    await context.sendActivity('Давай поболтаем)');
                }
            }
            // By calling next() you ensure that the next BotHandler is run.
            await next();
        });
    }
}

module.exports.EchoBot = EchoBot;
