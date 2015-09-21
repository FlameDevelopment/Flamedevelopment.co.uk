$(document).ready(function(){
    
    window.renderHandlebars = function(layout, elementId, wipe){
       if(typeof layout !=="undefined"){
           if(typeof wipe !== "undefined" && wipe){
                $("#"+elementId).html("");
            }
            $.each(layout, function(index, element){
                    var template = Handlebars.templates[element.type](element);
                    $("#"+elementId).append(template);
            }); 
       }
   };
    //make templates available as partials
    Handlebars.partials = Handlebars.templates;
    
    //allows dynamic partial names
    //{{partial this.templateName this}}
    Handlebars.registerHelper("partial", function (name, options) {
        // Get the partial with the given name. This is a string.
        var partial = Handlebars.partials[name];
        // Return empty string if the partial is not defined
        if (!partial) return "";
        // Compile and call the partial with this as context
        return new Handlebars.SafeString(Handlebars.templates[name](options));
    });
    
    //used to dump an object
    Handlebars.registerHelper('json', function(obj) {
        return JSON.stringify(obj);
    });
          
    //Join syntax for arrays
    // {{#join this delimiter=" "}}{{this}}{{/join}}
    Handlebars.registerHelper('join', function(items, block) {
          var delimiter = block.hash.delimiter || ",", 
              start = start = block.hash.start || 0, 
              len = items ? items.length : 0,
              end = block.hash.end || len,
              out = "";

              if(end > len) end = len;

          if ('function' === typeof block) {
              for (i = start; i < end; i++) {
                  if (i > start) out += delimiter;
                  if('string' === typeof items[i])
                      out += items[i];
                  else
                      out += block(items[i]);
              }
              return out;
          } else { 
              return [].concat(items).slice(start, end).join(delimiter);
          }
    }); 
    
    Handlebars.registerHelper('ifEquals', function(v1, v2, options) {
        if(v1 === v2) {
          return options.fn(this);
        }
        return options.inverse(this);
      });
});