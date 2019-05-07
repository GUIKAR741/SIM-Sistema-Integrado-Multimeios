$( document ).ready(function() {
    
		$('#calendar').fullCalendar({
			header: {
                left: 'prev,next,today',
                center: 'title',
				right: 'agendaWeek,agendaDay'
			},buttonText: {
                today:"Hoje",
                month: "Mês",
                week: "Semana",
                day: "Dia",
                list: "Compromissos"
            },
			businessHours: {
				// days of week. an array of zero-based day of week integers (0=Sunday)
				dow: [ 1, 2, 3, 4 ,5] ,// Monday - Thursday
				start: '07:00', // a start time (10am in this example)
				end: '17:00' // an end time (6pm in this example)
			},
			allDaySlot:false,
            displayEventEnd:true,
            allDayText: "dia inteiro",
			monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho',
				'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			dayNames:['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira',
				'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
			dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
				'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			hiddenDays:[0,6],
            defaultDate: '2015-12-12',
			defaultView:'agendaWeek',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
            //eventColor: '#000',
            eventBorderColor:'black',
            eventBackgroundColor:'#f00',
			events: [
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T07:10:00',
					end: '2015-12-10T08:00:00',
					url:"?p=agendamento&id=9",
                    borderColor:'black'
                    //backgroundColor :'#ff0',
                    //rendering: 'background'
				},{
					id: 999,
					title: 'Repeating ',
					start: '2015-12-10T07:10:00',
					end: '2015-12-10T08:00:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T08:00:00',
					end: '2015-12-10T08:50:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T09:10:00',
					end: '2015-12-10T10:00:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T10:00:00',
					end: '2015-12-10T10:50:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T10:50:00',
					end: '2015-12-10T11:40:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T11:40:00',
					end: '2015-12-10T13:10:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T13:10:00',
					end: '2015-12-10T14:00:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T14:00:00',
					end: '2015-12-10T14:50:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T15:10:00',
					end: '2015-12-10T16:00:00',
					url:"?p=agendamento&id=9"
				},{
					id: 999,
					title: 'Repeating Event',
					start: '2015-12-10T16:00:00',
					end: '2015-12-10T16:50:00',
					url:"?p=agendamento&id=9"
				}

			]
		});

});