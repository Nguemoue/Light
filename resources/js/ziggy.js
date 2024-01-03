const Ziggy = {"url":"http:\/\/light.test","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"home":{"uri":"\/","methods":["GET","HEAD"]},"daily-bread.index":{"uri":"daily-breads","methods":["GET","HEAD"]},"musiques.index":{"uri":"musiques","methods":["GET","HEAD"]},"daily-bread.show":{"uri":"daily-breads\/{dailyBread}","methods":["GET","HEAD"],"parameters":["dailyBread"],"bindings":{"dailyBread":"id"}},"encounters.index":{"uri":"encounters","methods":["GET","HEAD"]},"encounters.create":{"uri":"encounters\/create","methods":["GET","HEAD"]},"encounters.store":{"uri":"encounters","methods":["POST"]},"encounters.show":{"uri":"encounters\/{encounter}","methods":["GET","HEAD"],"parameters":["encounter"],"bindings":{"encounter":"id"}},"encounters.edit":{"uri":"encounters\/{encounter}\/edit","methods":["GET","HEAD"],"parameters":["encounter"],"bindings":{"encounter":"id"}},"encounters.update":{"uri":"encounters\/{encounter}","methods":["PUT","PATCH"],"parameters":["encounter"],"bindings":{"encounter":"id"}},"encounters.destroy":{"uri":"encounters\/{encounter}","methods":["DELETE"],"parameters":["encounter"],"bindings":{"encounter":"id"}},"formations.index":{"uri":"formations","methods":["GET","HEAD"]},"formations.create":{"uri":"formations\/create","methods":["GET","HEAD"]},"formations.store":{"uri":"formations","methods":["POST"]},"formations.show":{"uri":"formations\/{formation}","methods":["GET","HEAD"],"parameters":["formation"],"bindings":{"formation":"id"}},"formations.edit":{"uri":"formations\/{formation}\/edit","methods":["GET","HEAD"],"parameters":["formation"],"bindings":{"formation":"id"}},"formations.update":{"uri":"formations\/{formation}","methods":["PUT","PATCH"],"parameters":["formation"],"bindings":{"formation":"id"}},"formations.destroy":{"uri":"formations\/{formation}","methods":["DELETE"],"parameters":["formation"],"bindings":{"formation":"id"}},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"profile.edit":{"uri":"profile","methods":["GET","HEAD"]},"profile.update":{"uri":"profile","methods":["PATCH"]},"profile.destroy":{"uri":"profile","methods":["DELETE"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["POST"]},"admin.home":{"uri":"admin\/home","methods":["GET","HEAD"]},"admin.dailyBreads.index":{"uri":"admin\/dailyBreads","methods":["GET","HEAD"]},"admin.dailyBreads.create":{"uri":"admin\/dailyBreads\/create","methods":["GET","HEAD"]},"admin.dailyBreads.store":{"uri":"admin\/dailyBreads","methods":["POST"]},"admin.dailyBreads.show":{"uri":"admin\/dailyBreads\/{dailyBread}","methods":["GET","HEAD"],"parameters":["dailyBread"],"bindings":{"dailyBread":"id"}},"admin.dailyBreads.edit":{"uri":"admin\/dailyBreads\/{dailyBread}\/edit","methods":["GET","HEAD"],"parameters":["dailyBread"],"bindings":{"dailyBread":"id"}},"admin.dailyBreads.update":{"uri":"admin\/dailyBreads\/{dailyBread}","methods":["PUT","PATCH"],"parameters":["dailyBread"],"bindings":{"dailyBread":"id"}},"admin.dailyBreads.destroy":{"uri":"admin\/dailyBreads\/{dailyBread}","methods":["DELETE"],"parameters":["dailyBread"],"bindings":{"dailyBread":"id"}},"admin.login":{"uri":"admin\/login","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };