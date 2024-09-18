document.addEventListener('DOMContentLoaded', function () {
    function initListingsMap() {
        if (!listingsData || Object.keys(listingsData).length === 0) {
            console.error('No listings data available.');
            return;
        }

        // Convert object to array
        var listingsArray = Object.keys(listingsData).map(function(key) {
            return listingsData[key];
        });

        // Find the first listing with valid latitude and longitude
        var firstValidListing = listingsArray.find(listing => listing.latitude && listing.longitude);

        if (!firstValidListing) {
            console.error('No valid listings with latitude and longitude found.');
            // Set a default center or handle this scenario as needed
            return;
        }

        console.log('FIRST VALID LISTING DATA: ', JSON.stringify(firstValidListing, null, 2));

        var mapOptions = {
            zoom: 10,
            center: new google.maps.LatLng(firstValidListing.latitude, firstValidListing.longitude),
            scrollwheel: false,
            styles: [
              {
                  "featureType": "all",
                  "elementType": "labels",
                  "stylers": [
                      {
                          "visibility": "on"
                      }
                  ]
              },
              {
                  "featureType": "all",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "saturation": 36
                      },
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 40
                      }
                  ]
              },
              {
                  "featureType": "all",
                  "elementType": "labels.text.stroke",
                  "stylers": [
                      {
                          "visibility": "on"
                      },
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "featureType": "all",
                  "elementType": "labels.icon",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 17
                      },
                      {
                          "weight": 1.2
                      }
                  ]
              },
              {
                  "featureType": "administrative.country",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#b400bd"
                      }
                  ]
              },
              {
                  "featureType": "administrative.locality",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#c4c4c4"
                      }
                  ]
              },
              {
                  "featureType": "administrative.neighborhood",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#b400bd"
                      }
                  ]
              },
              {
                  "featureType": "landscape",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 20
                      }
                  ]
              },
              {
                  "featureType": "poi",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 21
                      },
                      {
                          "visibility": "on"
                      }
                  ]
              },
              {
                  "featureType": "poi.business",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "visibility": "on"
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#b400bd"
                      },
                      {
                          "lightness": "0"
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "geometry.stroke",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      }
                  ]
              },
              {
                  "featureType": "road.highway",
                  "elementType": "labels.text.stroke",
                  "stylers": [
                      {
                          "color": "#b400bd"
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 18
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "geometry.fill",
                  "stylers": [
                      {
                          "color": "#575757"
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#ffffff"
                      }
                  ]
              },
              {
                  "featureType": "road.arterial",
                  "elementType": "labels.text.stroke",
                  "stylers": [
                      {
                          "color": "#2c2c2c"
                      }
                  ]
              },
              {
                  "featureType": "road.local",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 16
                      }
                  ]
              },
              {
                  "featureType": "road.local",
                  "elementType": "labels.text.fill",
                  "stylers": [
                      {
                          "color": "#999999"
                      }
                  ]
              },
              {
                  "featureType": "transit",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 19
                      }
                  ]
              },
              {
                  "featureType": "water",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#000000"
                      },
                      {
                          "lightness": 17
                      }
                  ]
              }
          ]
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        listingsArray.forEach(function (listing) {
            if (!listing.latitude || !listing.longitude) {
                console.error('Skipping listing without valid latitude or longitude:', listing.name);
                return; // Skip this iteration if latitude or longitude is not valid
            }

            var latLng = new google.maps.LatLng(listing.latitude, listing.longitude);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: listing.name
            });

            // Define a template for the info window content with all the data
            var deliveryMethods = `
                <ul style="padding-left: 20px; margin: 10px 0;">
                    ${listing.delivery ? '<li>Delivery Available</li>' : ''}
                    ${listing.pickup ? '<li>Pickup Available</li>' : ''}
                    ${listing.curbside ? '<li>Curbside Pickup Available</li>' : ''}
                </ul>
            `;

            var infowindowContent = `
                <div style="max-width: 500px; font-family: Arial, sans-serif;">
                    <h2 class="text-primary" style="margin-top: 0;">${listing.name}</h2>
                    <p><strong>Phone:</strong> ${listing.phone}</p>
                    <p><strong>Email:</strong> <a href="mailto:${listing.email}">${listing.email}</a></p>
                    <p><strong>Address:</strong> ${listing.street} ${listing.street2} ${listing.city}, ${listing.state} ${listing.postal_code}, ${listing.country}</p>
                    <p><strong>Hours:</strong> ${listing.hours}</p>
                    ${deliveryMethods}
                    <p><strong>Description:</strong> ${listing.description}</p>
                    <p><strong>License:</strong> ${listing.license}</p>
                    ${listing.url ? `<p><strong>Website:</strong> <a href="${listing.url}" target="_blank">Visit Website</a></p>` : ''}
                </div>
            `;

            var infowindow = new google.maps.InfoWindow({
                content: infowindowContent
            });

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
        });


    }

    // Call the initListingsMap function to initialize the map
    initListingsMap();
});
