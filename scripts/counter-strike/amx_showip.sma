
#include <amxmodx>
#include <amxmisc>

public plugin_init()
{
    register_plugin("ShowIP", "0.00", "teame06")
    register_cvar("showip", "0.00", FCVAR_SERVER|FCVAR_SPONLY) /* For GameSpy/HLSW and such */
    register_concmd("amx_showip", "who_ip", ADMIN_BAN, "- Show players ip")
}

public who_ip(id,level,cid)
{
    if (!cmd_access(id,level,cid,1))
        return PLUGIN_HANDLED
    // Variables
    new user_ip[32], name[32], user_ping, user_loss, text[64], bot_ping[32]
    // get max players
    new maxplayers = get_maxplayers()
    // Console Print
    console_print(id, "Client IP:^n#  NICK             IP                   PING")
    // Loop command till it goes threw all users
    for(new j=1; j <= maxplayers; j++)
    {
        if(is_user_connected(j))
        {
            get_user_ip(j, user_ip, 31, 1)
            get_user_name(j, name, 31)
            get_user_ping(j, user_ping, user_loss)
            if(is_user_bot(j))
            {            
                user_ip = "BOT"
                bot_ping = "BOT_ARE_ON_SERVER"
                format(text, 63, "%2d %-16.15s %-20s %-8s", j, name, user_ip, bot_ping)
            }
            else
            {
                format(text, 63, "%2d %-16.15s %-20s %-8d", j, name, user_ip, user_ping)
            }
            console_print(id, text)
        }
    }
    return PLUGIN_CONTINUE
} 

