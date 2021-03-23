const AdsPage = {
	generateCitiesForRegion: (id, CityId, city_id) => {
		CityId.html('<option value="">City</option>')
		if (id) {
			AjaxRequest.get(`/api/cities/by-region/${id}`).then(res => {
				if (res && res.length > 0) {
					for (var i = 0; i < res.length; i++) {
						let option = ''
						if (city_id && res[i].id.toString() === city_id.toString()) {
							option = `<option value="${res[i].id}" selected>${res[i].title}</option>`
						} else {
							option = `<option value="${res[i].id}">${res[i].title}</option>`
						}
						CityId.append(option)
					}
					CityId.niceSelect('destroy')
					CityId.niceSelect()
				}
			})
		} else {
			CityId.niceSelect('destroy')
			CityId.niceSelect()
		}
	},
	generateColor: (ColorId, ColorInputDiv) => {
		ColorInputDiv.css('background-color', ColorId.find('option:selected').data('color'));
	}
}