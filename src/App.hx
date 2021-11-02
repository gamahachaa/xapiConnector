package;
import haxe.Exception;
import haxe.Json;
import lrs.vendors.LearninLocker;
import php.Lib;
import php.SuperGlobal;
import haxe.Serializer;
import haxe.Unserializer;
import php.Web;
import xapi.Activity;
import xapi.Agent;
import xapi.Context;
import xapi.Result;
import xapi.Statement;
import xapi.Verb;
import xapi.activities.Definition;
//import xapi.types.IObject;
import xapi.types.Score;
import xapi.types.StatementRef;
using StringTools;
/**
 * ...
 * @author bb
 */
class App
{
	var params:Map<String, String>;
	var resultMessageBack:Map<String,Dynamic>;
	var _maindebug:Bool;
	var lrs:LearninLocker;
	public function new()
	{
		Serializer.USE_CACHE = true;
		params = Lib.hashOfAssociativeArray(SuperGlobal._REQUEST);
		resultMessageBack = [];
		resultMessageBack.set("status", "failed");
		/*******************************
		 * Init local var
		/*******************************/
		var location = Web.getHostName();
		_maindebug = location.indexOf("test.salt.ch") >-1;
		lrs = if (_maindebug)
		{
			new LearninLocker("test","https://qast.test.salt.ch/data/xAPI/","25086ae582099d0c7b9c6bbf66688656b24b9478", "ee535a5e87d405d400d44d8a1a6693739e868ca7");
		}
		else
		{
			new LearninLocker("tm","https://qast.salt.ch/data/xAPI/","a36cc73da2a8a79f20b36e7502c10ed7eebee98b", "c2d3b79c52e94a99c4e239a3de529ffd6a60d2b0");
		}
		/*************************************
		 * Setup async listeners
		/*************************************/
		lrs.httpData.add(onData);
		lrs.errorStatus.add(onError);
		lrs.signalStatus.add(onStatus);
		//lrs.onLrsTestSignal.add(onLRSTest);
		if (params.exists("statement"))
		{
			sendStatement( params.get("statement"));
		}
		else
		{
			
			#if debug
			if (params.exists("verb"))
			{
				lrs.postStatement(prepareLeagacy());
			}
			else
			{
				
				//trace("App::App send test");
				sendStatement(testSerializer());
				//sendStatement(Serializer.run(testStatementCoach()));
			}
			#else
				lrs.postStatement(prepareLeagacy());
			#end

		}
	}

	function prepareLeagacy()
	{
		/***********************************
			 * Set default for testing
			 ***********************************/
		if (!params.exists("mbox")) params.set("mbox", "bruno.baudry@salt.ch");
		if (!params.exists("name")) params.set("name", "bbaudry");
		if (!params.exists("activity")) params.set("activity", "https://qook.test.salt.ch/trouble");
		if (!params.exists("contractor")) params.set("contractor", "399999999");
		if (!params.exists("voip")) params.set("voip", "0200000000");

		/*************************************
		 * Prepare MAIN values
		/*************************************/
		var agent = new Agent( params.get("mbox"), params.get("name") );
		var verb = switch ( params.get("verb") )
		{
			case "submitted": Verb.submitted;
			case "resolved": Verb.resolved;
			case "initialized": Verb.initialized;
			default: Verb.initialized;
		};
		var activity = new Activity(params.get("activity"));
		var def = new Definition();

		/****************************************************
		 * Prepare extension values
		/****************************************************/
		if (params.exists("contractor"))
		{
			def.extensions.set("https://vti.salt.ch/contractor/", params.get("contractor"));
		}
		if (params.exists("voip"))
		{
			def.extensions.set("https://vti.salt.ch/voip/", params.get("voip"));
		}
		if (params.exists("case"))
		{
			def.extensions.set("https://cs.salt.ch",params.get("case"));
		}
		if (params.exists("steps"))
		{
			def.extensions.set("https://qook.salt.ch/trouble/steps/", params.get("steps"));
		}
		if (params.exists("total_steps"))
		{
			def.extensions.set("https://qook.salt.ch/trouble/total_steps/", params.get("total_steps"));
		}
		if (params.exists("values"))
		{
			def.extensions.set("https://qook.salt.ch/trouble/values/", params.get("values"));
		}
		activity.definition = def;
		/**********************************
		 * Prepare statement
		/**********************************/
		var stmnt = new Statement(
			agent,
			verb,
			activity
		);
		if (params.exists("statement") && params.get("statement")!= null && params.get("statement")!= "null" )
		{
			resultMessageBack.set("statement", params.get("statement"));
			stmnt.context = new Context();
			stmnt.context.statement = new StatementRef(params.get("statement"));
		}
		return stmnt;
	}

	function sendStatement(stmt:String)
	{
		//var statement:Statement = Unserializer.run(stmt);
		var stage = 0;
		try{
			var statement = Unserializer.run(stmt);
			stage++;
			#if debug
			//trace("App::sendStatement");
			//trace(Type.getClassName(statement));
			//trace(Std.isOfType(statement,Statement));
			#end
			//resultMessageBack.set("stage", stage);
			//resultMessageBack.set("statement", stmt);
			lrs.postStatement(cast(statement, Statement));
			//Lib.print(Json.stringify(resultMessageBack));
			stage++;
		}
		catch (e:Exception)
		{
			//trace(e.message);
			resultMessageBack.set("msg", e.message);
			resultMessageBack.set("details", e.details);
			resultMessageBack.set("native", e.native);
			resultMessageBack.set("stage", stage);
			//resultMessageBack.set("native", e.previous);
			Lib.print(Json.stringify(resultMessageBack));
		}
	}

	function onStatus(status:Int)
	{
		#if debug
			//if (!_maindebug) trace("App::onStatus::status", status );
		#end
		if (status == 200)
		{
			resultMessageBack.set("status", "success");
		}
		else{
			resultMessageBack.set("status", "failed");
		}
	}

	function onError(msg:Dynamic)
	{
		#if debug
		//if(!_maindebug) trace("App::onError::msg", Std.string(msg) );
		#end
		resultMessageBack.set("msg", msg);
		Lib.print(Json.stringify(resultMessageBack));
	}

	function onData(data: String)
	{
		#if debug
		//if(!_maindebug) trace("App::onData::data", Json.parse( data ));
		#end
		resultMessageBack.set("statementsIds", Json.parse(data));
		Lib.print(Json.stringify(resultMessageBack));
	}
	function testStatementCoach():Statement
	{
		var I:Agent = new Agent("bruno.baudry@salt.ch", "COACH");
		var DID:Verb = Verb.mentoored;
		var THIS = new Agent("test@salt.ch", "monitoree");
		//var def:Definition = new Definition();
		var ext = [
		"https://qast.salt.ch/statements" =>"85ee8d13-c52f-49e5-a7ae-24f43fc566a8",
		];
		var ext1 = [
			"https://qook.test.salt.ch/tm//transactionSummary" => "sdjfh",
			"https://qook.test.salt.ch/tm//monitoringReason" => "basic",
			"https://qook.test.salt.ch/tm//monitoringType" => "remote",
			"https://qook.test.salt.ch/tm//monitoringSummary" => "sdfsdf"
		]; 
		var RESULT:Result = new Result(new Score(50,100,0), true, true, null,123456,ext);
		var ca:Map<ContextActivity,Array<Map<String,String>>> = [parent => [["id"=>"https://qook.test.salt.ch/tm"]]];
		var CONTEXT:Context = new Context(null,null,null,ca,null,null,"en",new StatementRef("85ee8d13-c52f-49e5-a7ae-24f43fc566a8"),ext1);
		//var CONTEXT:Context = new Context();
		//CONTEXT.addContextActivity(parent, new Activity("https://qook.test.salt.ch/tm"));
		//CONTEXT.platform = "https://qook.test.salt.ch/tm";
		//CONTEXT.extensions = ext1;
		//CONTEXT.statement = new StatementRef("85ee8d13-c52f-49e5-a7ae-24f43fc566a8");
		//var CONTEXT:Context = new Context(null,null,null,ca,null,"qook","en",new StatementRef("85ee8d13-c52f-49e5-a7ae-24f43fc566a8"));
		//var CONTEXT:Context = new Context(null,null,null);
		
		var stmt = new Statement(I, DID, THIS, RESULT, CONTEXT);
		//trace("<pre>" + prepareStatement([stmt]) + "</pre>");
		return stmt;
	}
	function testStatementAgent():Statement
	{
		var I:Agent = new Agent("b@salt.ch", "TEST");
		var DID:Verb = Verb.mentoored;
		var def:Definition = new Definition();
		var score = new Score(50, 100, 0);
		var RESULT:Result = new Result(score, true, true, "monitoring summary");

		def.name.set("en", "test");
		def.type = "http://activitystrea.ms/schema/1.0/review";
		def.extensions = [];
		def.extensions.set("https://test.ch/Int", 1);
		def.extensions.set("https://test.ch/String", "string");
		def.extensions.set("https://test.ch/Float", 9.99);
		def.extensions.set("https://test.ch/Bool", false);
		var THIS:Activity = new Activity("https://qook.salt.ch/transaction_monitoring/", def);
		var CONTEXT:Context = new Context();
		CONTEXT.instructor = new Agent("tutor@salt.ch", "tutor");
		CONTEXT.statement = new StatementRef("d77e7afc-2738-46e1-a488-c6c592120183");
		return new Statement(I, DID, THIS, RESULT, CONTEXT);
	}
	function testSerializer()
	{
		//return "cy14:xapi.Statementy11:attachmentsny9:timestampy32:2021-04-01T08%3A15%3A29.4680000Zy7:contextcy12:xapi.Contexty8:languagey2:eny10:extensionsby52:https%3A%2F%2Fqook.test.salt.ch%2FtransactionSummaryy6:sdfsdfy50:https%3A%2F%2Fqook.test.salt.ch%2FmonitoringReasony5:basicy48:https%3A%2F%2Fqook.test.salt.ch%2FmonitoringTypey6:remotey51:https%3A%2F%2Fqook.test.salt.ch%2FmonitoringSummaryR10hy9:statementcy23:xapi.types.StatementRefy2:idy36:381855ec-7ed1-479b-b715-b87483ac7d68y10:objectTypey12:StatementRefgy8:platformy4:qooky8:revisionny17:contextActivitiesby6:parentahy8:groupingahy5:otherahy8:categoryahhy10:instructorny12:registrationngy6:resultcy11:xapi.Resulty8:durationy11:P0DT0H0M19Sy8:responseny10:completionty7:successty5:scorecy16:xapi.types.Scorey3:maxi100y3:minzy3:rawi100y6:scaledi1gR8by39:https%3A%2F%2Fqast.salt.ch%2Fstatementsr3hgy6:objectcy10:xapi.AgentR20y5:Agenty4:mboxy31:mailto%3Abruno.baudry%40salt.chy4:namey7:bbaudrygy4:verbcy9:xapi.VerbR18y47:http%3A%2F%2Fid.tincanapi.com%2Fverb%2Fmentoredy7:displaybR7y8:mentoredhgy5:actorcR47R20R48R49R50R51R52gg";
		return "cy14:xapi.Statementy11:attachmentsny9:timestampy32:2021-04-01T12%3A51%3A58.4760000Zy7:contextcy12:xapi.Contexty8:languagey2:eny10:extensionsny9:statementny8:platformy4:qooky8:revisionny17:contextActivitiesby6:parentaby2:idy31:https%3A%2F%2Fqook.test.salt.chhhy8:groupingahy5:otherahy8:categoryahhy10:instructorcy10:xapi.Agenty10:objectTypey5:Agenty4:mboxy31:mailto%3Abruno.baudry%40salt.chy4:namey7:bbaudrygy12:registrationngy6:resultcy11:xapi.Resulty8:durationy10:P0DT0H0M0Sy8:responseny10:completionty7:successty5:scorecy16:xapi.types.Scorey3:maxi100y3:minzy3:rawi100y6:scaledi1gR8by71:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.compliance.compliancey1:yy66:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.welcomeR43y66:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.empathyR43y69:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.nextestepsR43y66:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.closingR43y71:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.paraphrasingR43y65:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.customer.onholdR43y66:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.processR43y71:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.expectationsR43y73:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.ticketCreationR43y75:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.contactAvoidanceR43y69:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.addedvalueR43y65:https%3A%2F%2Fqook.test.salt.ch%2Fcontent.inbound.business.wrapupR43hgy6:objectcy13:xapi.ActivityR22y8:ActivityR15y46:https%3A%2F%2Fqook.test.salt.ch%2Ftm%2Finboundy10:definitioncy26:xapi.activities.DefinitionR26bhy11:descriptionbhR8by60:https%3A%2F%2Fqook.test.salt.ch%2Ftm%2F%2FtransactionSummaryy8:jhkljshfy58:https%3A%2F%2Fqook.test.salt.ch%2Ftm%2F%2FmonitoringReasony5:basicy56:https%3A%2F%2Fqook.test.salt.ch%2Ftm%2F%2FmonitoringTypey6:remotey59:https%3A%2F%2Fqook.test.salt.ch%2Ftm%2F%2FmonitoringSummaryy8:dfgmflkghy4:typey53:http%3A%2F%2Factivitystrea.ms%2Fschema%2F1.0%2Freviewy8:moreInfonggy4:verbcy9:xapi.VerbR15y54:http%3A%2F%2Factivitystrea.ms%2Fschema%2F1.0%2Freceivey7:displaybR7y7:receivehgy5:actorcR21R22R23R24R25R26R27gg"
;

	}
	function prepareStatement(stmts:Array<Statement>) 
	{
		var s:String ="";
		try{
			//trace(stmts);
			s = Json.stringify(stmts);
			//trace(s);
			//trace("STMT2");
			var ereg = ~/,\s*"[^"]+":null|"[^"]+":null,?/g;
			var ereg2 = ~/,\s*"[^"]+":\[\]|"[^"]+":\[\],?/g;
			var ereg3 = ~/,\s*"[^"]+":\{\}|"[^"]+":\{\},?/g;

			s = ereg.replace(s, "");
			s = ereg2.replace(s, "");
			s = ereg3.replace(s, "");
		}
		catch (e:Dynamic)
		{
			trace(e);
		}
		#if debug
		//trace(s);
		#end
		return s;
	}
}