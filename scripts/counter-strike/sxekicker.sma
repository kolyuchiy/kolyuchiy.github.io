
#include <amxmodx>

#define PLUGIN_NAME "NO-sXe-I Kicker"
#define PLUGIN_VERSION "0.1"
#define PLUGIN_AUTHOR "Kolia"

// kick reasons
new const g_kick_reason[] = "ycTaHoBu AHTu4uT freedomnet.ru/sxe.exe"

// chat reasons
new const g_kick_chat[] = "[AMXX] %s KuKHyT noToMy 4To 6e3 aHTu4uTa"

#define MAX_PLAYERS 32
new g_maxplayers

public plugin_init() {
        register_plugin(PLUGIN_NAME, PLUGIN_VERSION, PLUGIN_AUTHOR)
        set_task(15.0, "watchShit", 123125, "", 0, "b")


        g_maxplayers = get_maxplayers()
}

public watchShit() {
        if (get_playersnum(1) <= 10)
                return

        static players[32], num, i, uname[64]
        new candidate
        get_players(players, num)
        for (new x=0; x < num; x++) {
                i = players[x]
                get_user_name(i, uname, 63)
                if ( ! (strfind(uname, "[NO-sXe-I]") == -1) ) {
                        candidate = i
//                      chat_msg(candidate, g_kick_chat)
                        client_kick(candidate, g_kick_reason)
                        return
                }
        }
}

chat_msg(id, const text[]) {
        static name[32]
        get_user_name(id, name, 31)
        client_print(0, print_chat, text, name)
}

stock client_kick(id, const reason[] = "") {
        server_cmd("kick #%d ^"%s^"", get_user_userid(id), reason)
        server_exec()
}


